<x-layout page="Todo: Login">
    <x-slot:btn>
        <a href="{{route('login')}}" class="btn btn-primary"> faça login</a>
    </x-slot:btn>
    <section id="task_section">
        <h2>Criar Perfil</h2>
        @if ($errors->any())
            <ul class="alert-erro">
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{route('user.register_action')}}">
            @csrf 
            <x-form.text_input name="name" label="Seu Nome:" placeholder="Digite o seu nome" required="1" />
            <x-form.text_input type="email"  name="email" label="Seu Email" placeholder="informe o e-mail" required="1" />
            <x-form.text_input type="password"  name="password" label="Sua Senha" placeholder="informe a senha" required="1" />
            <x-form.text_input type="password"  name="password_confirmation" label="Confirme Sua Senha" placeholder="digite a senha novamente" required="1" />
            <x-form.form_button resetTxt="Limpar " submitTxt="Registrar-se" />
        </form>
    </section>
</x-layout>