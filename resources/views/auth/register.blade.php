@extends('layout')

@section('content')
    <main class="max-w-[500px] w-9/10 mx-auto">
        <form method="POST" action="{{ route('register') }}" class="mt-8 p-5 bg-white rounded-lg shadow-md">
            @csrf
            <h1 class="text-center mb-5">Cadastro</h1>
            <!-- Name -->
            <div>
                <x-input-label for="name" value="Nome" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- CPF -->
            <div class="mt-4">
                <x-input-label for="cpf" value="CPF" />
                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autofocus />
                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" value="Telefone" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" value="Senha" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" value="Confirmar senha" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-8">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-1/2 text-center" href="{{ route('login') }}">
                    Já tem cadastro?
                </a>
                <x-primary-button class="ms-8 w-1/2 flex justify-center h-10">
                    Registrar
                </x-primary-button>
            </div>
        </form>
    </main>

    <script>
        document.getElementById('phone').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, ''); // remove tudo que não é número

            if (value.length > 11) {
                value = value.substring(0, 11); // limita a 11 dígitos
            }

            // Aplica máscara (99) 99999-9999
            if (value.length > 6) {
                e.target.value = `(${value.slice(0,2)}) ${value.slice(2,7)}-${value.slice(7)}`;
            } 
            else if (value.length > 2) {
                e.target.value = `(${value.slice(0,2)}) ${value.slice(2)}`;
            } 
            else {
                e.target.value = value; // apenas DDD
            }
        });

        document.getElementById('cpf').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // remove qualquer coisa que não seja número

            if (value.length > 11) {
                value = value.substring(0, 11); // limita a 11 dígitos
            }

            // Máscara: 000.000.000-00
            if (value.length > 9) {
                e.target.value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
            }
            else if (value.length > 6) {
                e.target.value = value.replace(/(\d{3})(\d{3})(\d{1,3})/, "$1.$2.$3");
            }
            else if (value.length > 3) {
                e.target.value = value.replace(/(\d{3})(\d{1,3})/, "$1.$2");
            }
            else {
                e.target.value = value;
            }
        });
    </script>
    
@endsection
