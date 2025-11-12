@extends('layout')

@section('content')

    <div class="max-w-[600px] w-full mx-auto px-5 py-8 bg-white rounded-lg shadow mt-10">
        <h1 class="text-3xl text-center">Redefinição de Senha</h1>
        <p class="text-sm mt-2 px-3 text-center">Enviaremos um link para seu e-mail para poder realizar a troca da senha</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mt-5">
                <x-input-label for="email" value="E-mail" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                   Enviar link de alteração de senha
                </x-primary-button>
            </div>
        </form>
    <div>

@endsection