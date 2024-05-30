<x-layout page="Todo: Login">
    <x-slot:btn>
        <a href="{{ route('register') }}" class="btn btn-primary"> Registre-se</a>
    </x-slot:btn>
    <section id="task_section">
        <h2>Fazer Login</h2>
        @if ($errors->any())
            <ul class="alert-erro">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('user.login_action') }}">
            @csrf
            <x-form.text_input type="email" name="email" label="Seu Email" placeholder="informe o e-mail"
                required="1" />
            <x-form.text_input type="password" name="password" label="Sua Senha" placeholder="informe a senha"
                required="1" />
            <x-form.form_button resetTxt="Limpar " submitTxt="fazer Login" />
        </form>
    </section>
</x-layout>
