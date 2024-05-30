<x-layout>
    <x-slot:btn>
        <a href="{{ route('task.create') }}" class="btn btn-primary"> criar tarefa</a>
        <a href="{{ route('logout') }}" class="btn btn-primary"> sair</a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph-header">
            <div class="graph-header-text">Progresso do dia</div>
            <span class="linha-header"></span>
            <div class="graph-header-date">
                <a href="{{route('home', ['date' => $datePrevius])}}">
                    <img src="/assets/images/icon-prev.png" alt="">
                </a>
                {{ $stringDate }}
                <a href="{{route('home', ['date' => $dateNext])}}">
                    <img src="/assets/images/icon-next.png" alt="">
                </a>
            </div>
        </div>
        <div class="grap-header--subtitle">
            tarefas <b>{{ $completTasks }}/{{ $tasksCount }}</b>
        </div>
        <div class="graph-placeholder">

        </div>

        <div class="tasks-left">
            <img src="assets/images/icon-info.png" alt=""> restam {{ $tasksCount - $completTasks }} tarefas para
            serem realizadas
        </div>

    </section>
    <section class="list">
        <div class="list-header">
            <select name="list-header-select" onchange="changetasks(this)">
                <option value="all-tasks"> todas as tarefas</option>
                <option value="pending_tasks"> tarefas pendentes</option>
                <option value="done_tasks"> tarefas concluidas</option>
            </select>
        </div>
        <div class="task_list">
            @foreach ($tasks as $task)
                <x-task :data=$task />
            @endforeach

        </div>
    </section>
    <script>
        async function taskUpdate(elemento) {
            let status = elemento.checked;
            let taskId = elemento.dataset.id;
            let url = '{{ route('task.update') }}';

            let rawResult = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({
                    status,
                    taskId,
                    _token: '{{ csrf_token() }}'
                })
            });

            result = await rawResult.json();

            if (!result.success) {
                elemento.checked = !status;
            }
        }
    </script>
    <script>
        function changetasks(e){
            if(e.value == 'pending_tasks'){
                showAllTasks();
                document.querySelectorAll('.task_done').forEach( function (element){
                    element.style.display = 'none';
                });
            } else if(e.value == 'done_tasks') {
                showAllTasks();
                document.querySelectorAll('.task_pending').forEach( function (element){
                    element.style.display = 'none';
                });
            }else{
                showAllTasks();
            }
        }

        function showAllTasks(){
            document.querySelectorAll('.task').forEach( function (element){
                    element.style.display = 'flex';
                });
        }
    </script>
</x-layout>
