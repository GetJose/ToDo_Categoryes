<x-layout page="Todo: Tasks">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary"> Voltar</a>
    </x-slot:btn>
    <section id="task_section">
        <h2>Editar Tarefa</h2>
        <form method="POST" action="{{ route('task.edit_action') }}">
            @csrf
            <input hidden value="{{ $task->id }}" name="id" />
            <x-form.text_input name="title" label="Titulo da Task" placeholder="Digite o titulo da tarefa"
                required="1" value="{{ $task->title }}" />
            <x-form.text_input type="datetime-local" name="due_date" label="Data de Realização"
                placeholder="Escolha a dataS da tarefa" required="1" value="{{ $task->due_date }}" />
            <x-form.select_input name="category_id" label="Categoria" required="1">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $task->category->id) selected @endif>
                        {{ $category->title }}</option>
                @endforeach
            </x-form.select_input>
            <x-form.check_input name="is_done" label="Estado da Tarefa" type="checkbox" state="{{ $task->is_done }}" />
            <x-form.text_area name="description" label=" Descrição da Tarefa"
                placeholder="Digite a descrição da Sua tarefa" value="{{ $task->description }}" />
            <x-form.form_button resetTxt="Resetar" submitTxt="Salvar Tarefa" />
        </form>
    </section>
</x-layout>
