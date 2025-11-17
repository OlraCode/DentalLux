<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Sair da conta
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Faça logout
        </p>
    </header>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="button bg-red-600 text-white hover:opacity:80">Sair</button>
    </form>

    
</section>
