<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Informações do Perfil
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Atualize suas informações de perfil.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="phone" value="Telefone" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Salvar</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Atualizado.') }}</p>
            @endif
        </div>
    </form>
</section>

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
</script>
