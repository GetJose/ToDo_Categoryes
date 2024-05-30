<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $r)
    {
        $date = date('Y-m-d');

        if ($r->date) {
            $date = $r->date;
        }

        $data['tasks'] = Task::whereDate('due_date', $date)->get();

        $carbonDate = Carbon::createFromDate($date);

        $data['stringDate'] = $carbonDate->format('d \d\e M');
        $data['datePrevius'] = $carbonDate->addDay(-1)->format('Y-m-d');
        $data['dateNext'] = $carbonDate->addDay(2)->format('Y-m-d');

        $data['completTasks'] = $data['tasks']->where('is_done', true)->count();
        $data['tasksCount'] = count($data['tasks']);
        $data['authUser'] = Auth::user();
        return view('home', $data);
    }
}
