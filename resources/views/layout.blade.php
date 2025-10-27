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
        <div class="mx-24 flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('img/logo.png') }}" alt="Dental Lux" class="w-10 mr-2">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-bold text-sky-500">DentalLux</h1>
                    <p class="text-sm text-gray-400">Seu sorriso é nossa prioridade</p>
                </div>
            </div>
            <nav class="flex gap-3 items-center">
                <a href="#" @class([
                        'button border-0',
                        'bg-sky-500 text-white shadow-lg hover:opacity-75' => request()->routeIs('home')
                    ])>
                    <img src="{{ asset('img/home.png') }}" @class(['h-4 brightness-0', 'brightness-100' =>  request()->routeIs('home')])>
                    Home
                </a>

                <a href="#" @class([
                        'button border-0',
                        'bg-sky-500 text-white shadow-lg hover:opacity-75' => request()->routeIs('agenda')
                    ])>
                    <img src="{{asset('img/agenda.png')}}" @class(['h-4 brightness-0', 'brightness-100' =>  request()->routeIs('agenda')])>
                    Agendar
                </a>

                <a href="#" @class([
                        'button border-0',
                        'bg-sky-500 text-white shadow-lg hover:opacity-75' => request()->routeIs('consult')
                    ])>
                    <img src="{{ asset('img/user.png') }}" @class(['h-4 brightness-0', 'brightness-100' =>  request()->routeIs('consult')])>
                    Minhas Consultas
                </a>
            </nav>

            <div class="flex gap-3">
                <a target="_blank" href="https://wa.me/5521999999999?text=Ol%C3%A1%2C%20gostaria%20de%20agendar%20uma%20consulta" class="button bg-sky-500 text-white border-0 h-12 font-semibold">
                    <img src="{{ asset('img/phone.png') }}" class="h-6">(21)
                    99999-9999
                </a>

                <a href="#" class="button h-12"><img src="{{ asset('img/userIcon.png') }}" alt="User" class="w-10">Duda Ramos</a>
                
            </div>
            
        </div>
    </header>

    <main class="max-w-[1600px] mx-auto p-6 flex-1">
        @yield('content')
    </main>

    <footer class="bg-gray-200 text-center py-4 text-sm text-gray-600">
        &copy; {{ date('Y') }} Dental Lux. Todos os direitos reservados.
    </footer>

</body>
</html>
