<div class="task {{$data['is_done'] ? 'task_done' : 'task_pending'}}">
    <div class="title">
        <input type="checkbox" @if (!empty($data) && $data['is_done']) checked @endif onchange="taskUpdate(this)" data-id="{{$data['id']}}"/>
        <span>{{ $data['title'] ?? '' }}</span>
    </div>

    <div class="priority">
        <div class="sphere"></div>
        <span>{{ $data['category']['title'] ?? '' }}</span>
    </div>
    <div class="actions">
        <a href="{{ route('task.edit', ['id' => $data['id']]) }}">
            <img src="assets/images/icon-edit.png" alt="">
        </a>
        <a  href="{{ route('task.delete', ['id' => $data['id']]) }}">
            <img src="assets/images/icon-delete.png" alt="">
        </a>
    </div>


</div>
