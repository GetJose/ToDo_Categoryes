<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $r){
        $categories = Category::all();//por enquanto all pois não validamos o usuario
        $data['categories'] = $categories;
        return view('tasks.create', $data);
    }
    public function create_action(Request $r){
        $task = $r->only(['title', 'due_date', 'category_id', 'description']);
        $task['user_id'] = 1;
        $task = Task::create($task);
        return redirect(route('home'));
    }
    public function index(Request $r){
        return null;
    }
    public function edit(Request $r){
        $id = $r->id;
        $task = Task::find($id);
        if(!$task){
            return redirect(route('home'));
        }
        $data['task'] = $task;
        $categories = Category::all();//por enquanto all pois não validamos o usuario
        $data['categories'] = $categories;

        return view('tasks.edit', $data);
    }

    public function edit_action(Request $r){
        $data = $r->only(['title', 'due_date', 'category_id', 'description']);
        $data['is_done'] = $r->is_done ? true : false;
        $task = Task::find($r->id);
        if(!$task){
            return "Erro task não encontrada";
        }
        $task->update($data);
        $task->save();

        return redirect(route('home'));
    }

    public function delete(Request $r){
        $id = $r->id;
        $task = Task::find($id);
        if($task){
            $task->delete();
        }
       return redirect(route('home'));
    }

    public function update(Request $request){
        $task = Task::findOrFail($request->taskId);
        $task->is_done = $request->status;
        $task->save();

        return ['success' => true];
    }
}
