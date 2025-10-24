<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dental Lux</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen flex flex-col bg-sky-50 text-gray-900">

    <header class="bg-white shadow p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('img/logo.png') }}" alt="Dental Lux" class="w-10 mr-2">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-bold text-sky-500">DentalLux</h1>
                    <p class="text-sm text-gray-400">Seu sorriso é nossa prioridade</p>
                </div>
            </div>
            <nav class="space-x-4">
                <a href="#" class="hover:text-blue-600">Início</a>
                <a href="#" class="hover:text-blue-600">Sobre</a>
            </nav>

            <button class="flex items-center gap-2 border border-gray-300 rounded-lg px-5 py-1 font-semibold text-gray-700 cursor-pointer hover:bg-sky-100 transition"><img src="{{ asset('img/userIcon.png') }}" alt="User" class="w-10">Duda Ramos</button>
            
        </div>
    </header>

    {{-- Conteúdo específico de cada página --}}
    <main class="max-w-7xl mx-auto p-6 flex-1">
        @yield('content')
    </main>

    {{-- Rodapé --}}
    <footer class="bg-gray-200 text-center py-4 text-sm text-gray-600">
        &copy; {{ date('Y') }} Dental Lux. Todos os direitos reservados.
    </footer>

</body>
</html>
