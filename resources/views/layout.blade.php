<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dental Lux</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen flex flex-col bg-sky-50 text-gray-900">

    <header class="bg-white shadow p-4 w-screen">
        <div class="md:mx-24 flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center cursor-pointer">
                <img src="{{ asset('img/logo.png') }}" alt="Dental Lux" class="w-10 mr-2">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-bold text-sky-500">DentalLux</h1>
                    <p class="text-sm text-gray-400 hidden md:block">Seu sorriso é nossa prioridade</p>
                </div>
            </a>
            <nav class="hidden md:flex gap-3 items-center">
                <a href="{{ route('home') }}" @class([
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

            <div class="hidden md:flex gap-3">
                <a target="_blank" href="https://wa.me/5521973075405?text=Ol%C3%A1%2C%20gostaria%20de%20agendar%20uma%20consulta" class="button bg-sky-500 text-white border-0 h-12 font-semibold hover:opacity-75">
                    <img src="{{ asset('img/phone.png') }}" class="h-6">(21) 97307-5405
                </a>

                @auth
                    <a href="{{ route('profile.edit') }}" class="button h-12"><img src="{{ asset('img/userIcon.png') }}" alt="User" class="w-10">Carlo Mathias</a>
                @else
                    <a href="{{ route('login') }}" class="button h-12 ml-5 border-sky-100 hover:bg-sky-100 bg-sky-50">Entrar</a>
                    <a href="{{ route('register') }}" class="button h-12 bg-sky-500 hover:bg-sky-400 text-white">Cadastrar</a>
                @endauth
                
            </div>
            
            <div class="md:hidden">
                <img src="{{ asset('img/menu.png') }}" alt="Menu" class="h-10 cursor-pointer hover:opacity-75" id="menuButton">
            </div>

        </div>
    </header>

    
    <div class="bg-white h-screen w-0 right-0 fixed transition-all duration-300 ease-out shadow-lg z-10" id="menuContainer">
        
        <div class="invisible pointer-events-none opacity-0 transition-opacity duration-400 fixed h-screen left-0 w-1/2 bg-black/40 backdrop-blur-xs z-10" id="overlay"></div>

        <div class="invisible pointer-events-none opacity-0 flex flex-col items-center h-full transition-opacity duration-300 z-10" id="menuContent">

            @auth
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 bg-gray-100 rounded py-6 px-2 hover:opacity-75">
                    <img src="{{ asset('img/userIcon.png') }}" class="h-16">
                    <div class="">
                        <h2>Olá, Carlo Mathias</h2>
                        <p>Bem vinda de volta</p>
                    </div>
                </a>
                <a href="{{ route('profile.edit') }}" class="button border-0 w-19/20 text-sky-500 mt-1 mb-8 flex justify-center">Acessar perfil</a>
            @else
                <a href="{{ route('login') }}" class="button border-0 w-19/20 bg-sky-100 mt-5 flex justify-center">Entrar</a>
                <a href="{{ route('register') }}" class="button w-19/20 text-white bg-sky-500 mt-1 mb-8 flex justify-center">Cadastrar</a>
            @endauth

            <a href="{{ route('home') }}" class="button border-0 w-19/20 my-1 flex justify-center">Home</a>
            <a href="#" class="button border-0 w-19/20 my-1 flex justify-center">Agendar</a>
            <a href="#" class="button border-0 w-19/20 my-1 flex justify-center">Consultas</a>
            <a target="_blank" href="https://wa.me/5521973075405?text=Ol%C3%A1%2C%20gostaria%20de%20agendar%20uma%20consulta" class="button mt-auto mb-8 bg-sky-500 text-white border-0 h-12 font-semibold hover:opacity-75">
                <img src="{{ asset('img/phone.png') }}" class="h-6">
                (21) 97307-5405
            </a>
            <div class="fixed left-3/8 top-4 bg-white size-11 flex items-center justify-center rounded-full text-2xl cursor-pointer hover:bg-gray-200 transition shadow-lg z-10" id="closeButton">x</div>
        </div>

    </div>


    <main class="max-w-[1600px] w-full mx-auto p-6 flex-1">
        @yield('content')
    </main>

    <footer class="bg-gray-200 text-center py-4 text-sm text-gray-600">
        &copy; {{ date('Y') }} Dental Lux. Todos os direitos reservados.
    </footer>


    <script>
        const menuBtn = document.getElementById('menuButton')
        const menuContainer = document.getElementById('menuContainer')
        const menuContent = document.getElementById('menuContent')
        const overlay = document.getElementById('overlay')
        const closeBtn = document.getElementById('closeButton')

        function openMenu() {
            menuContainer.classList.toggle('w-0')
            menuContainer.classList.toggle('w-1/2')
            setTimeout(() => {
                overlay.classList.toggle("invisible");
                overlay.classList.toggle("pointer-events-none");
                overlay.classList.toggle('opacity-0')
                overlay.classList.toggle('opacity-100')
                menuContent.classList.toggle("invisible");
                menuContent.classList.toggle("pointer-events-none");
                menuContent.classList.toggle('opacity-0')
                menuContent.classList.toggle('opacity-100')
            }, 200);
        }
        function closeMenu() {
            overlay.classList.toggle("pointer-events-none");
            overlay.classList.toggle('opacity-0')
            overlay.classList.toggle('opacity-100')
            menuContent.classList.toggle("pointer-events-none");
            menuContent.classList.toggle('opacity-0')
            menuContent.classList.toggle('opacity-100')
            setTimeout(() => {
                overlay.classList.toggle("invisible");
                menuContent.classList.toggle("invisible");
                menuContainer.classList.toggle('w-0')
                menuContainer.classList.toggle('w-1/2')
            }, 150);
        }

        menuBtn.addEventListener('click', openMenu)
        closeBtn.addEventListener('click', closeMenu)
        overlay.addEventListener('click', closeMenu)

    </script>
</body>
</html>
