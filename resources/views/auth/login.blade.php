@extends('layout')

@section('content')

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-[600px] w-9/10 mx-auto p-3 flex-1">
        <form method="POST" action="{{ route('login') }}" class="mt-10 p-5 py-8 bg-white rounded-lg shadow-md">
            @csrf

            <h1 class="text-center mb-5">Entrar</h1>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" value="E-mail" />
                <x-text-input id="email" class="block mt-1 mb-4 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" value="Senha" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">Lembrar</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center w-1/2" href="{{ route('password.request') }}">
                        Esqueceu sua senha?
                    </a>
                @endif

                <x-primary-button class="ms-3 w-1/2 h-10 flex justify-center">
                    Entrar
                </x-primary-button>
            </div>
        </form>
    </div>

@endsection
