<x-layout page="Todo: Tasks">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary"> Voltar</a>
    </x-slot:btn>
    
    <section id="task_section">
        <h2>Criar Tarefa</h2>
        <form method="POST" action="{{route('task.create_action')}}">
            @csrf 
            <x-form.text_input name="title" label="Titulo da Task" placeholder="Digite o titulo da tarefa" required="1" />
            <x-form.text_input type="datetime-local"  name="due_date" label="Data de Realização" placeholder="Escolha a dataS da tarefa" required="1" />
            <x-form.select_input name="category_id" label="Categoria" required="1">
                @foreach ( $categories as $category)
                    <option value="{{$category->id}}"> {{$category->title}}</option>
                @endforeach
            </x-form.select_input>
            <x-form.text_area name="description" label=" Descrição da Tarefa" placeholder="Digite a descrição da Sua tarefa" />
            <x-form.form_button resetTxt="Resetar" submitTxt="Salvar Tarefa" />
        </form>
    </section>

</x-layout>