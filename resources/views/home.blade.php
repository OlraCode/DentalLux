@extends('layout')

@section('content')

    <div class="text-center md:text-left md:flex items-center mt-12">
        <div class="flex flex-col items-center basis-8/10">
            <div class="">
                <h1 class="md:text-7xl">Seu sorriso</h1>
                <h1 class="text-sky-500 md:text-7xl">merece o melhor</h1>
                <p class="my-5 max-w-lg md:text-lg">Tecnologia avançada e atendimento humanizado para cuidar da sua saúde bucal com excelência.</p>
                <div class="flex gap-3 justify-center md:justify-start">
                    <a href="#" class="button bg-sky-400 text-white h-12">Agendar Consulta</a>
                    <a href="#" class="button border-2 border-sky-400 text-sky-400 h-12">Saiba Mais</a>
                </div>

                <div class="flex justify-between gap-3 w-9/10 mx-auto mt-12 mb-16">
                    <div>
                        <h1 class="text-3xl text-sky-500">1000+</h1>
                        <p>Paciêntes felizes</p>
                    </div>
                    <div>
                        <h1 class="text-3xl text-sky-500">15+</h1>
                        <p>Especialidades</p>
                    </div>
                    <div>
                        <h1 class="text-3xl text-sky-500">99%</h1>
                        <p>Satisfação</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="basis-7/10">
            <img src="{{ asset('img/destist.png') }}" alt="Consultório" class="w-full mx-auto">
        </div>
    </div>

    <div class="mt-32 flex items-center justify-center gap-5">
        <div class="hidden md:block basis-5/10">
            <img src="{{ asset('img/consulta.png') }}" class="w-full">
        </div>
        <div class="px-2">
            <h1 class="text-4xl mb-3">Por que escolher DentalLux?</h1>
            <p class="">Somos referência em odontologia de qualidade, combinando tecnologia e humanização.</p>
            <div class="flex flex-col gap-3 mt-4">
                <div class="bg-white p-4 rounded-xl shadow-md flex items-center gap-3 hover:-translate-y-1 transition">
                    <img src="{{ asset('img/check.png') }}" class="w-10">
                    <h2>Equipamentos de última geração</h2>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-md flex items-center gap-3 hover:-translate-y-1 transition">
                    <img src="{{ asset('img/check.png') }}" class="w-10">
                    <h2>Profissionais especializados</h2>
                </div>
        
                <div class="bg-white p-4 rounded-xl shadow-md flex items-center gap-3 hover:-translate-y-1 transition">
                    <img src="{{ asset('img/check.png') }}" class="w-10">
                    <h2>Atendimento humanizado</h2>
                </div>

                <div class="bg-white p-4 rounded-xl shadow-md flex items-center gap-3 hover:-translate-y-1 transition">
                    <img src="{{ asset('img/check.png') }}" class="w-10">
                    <h2>Agendamento online facilitado</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-16 flex flex-col items-center">
        <h1 class="text-5xl mb-1">Nossos Serviços</h1>
        <p class="text-lg">Tratamentos completos para todas as suas necessidades odontológicas.</p>

        <div class="flex flex-wrap justify-center gap-5 mt-6">
            <div class="bg-white p-8 rounded-xl w-90 shadow-md hover:shadow-xl transition-shadow">
                <img src="{{ asset('img/sparkle.png') }}" class="bg-sky-500 rounded-2xl w-15 p-3 mb-3">
                <h2 class="text-2xl">Limpeza Dental</h2>
                <p>Profilaxia completa para manter seus dentes sempre saudáveis</p>
            </div>

            <div class="bg-white p-8 rounded-xl w-90 shadow-md hover:shadow-xl transition-shadow">
                <img src="{{ asset('img/star.png') }}" class="bg-purple-500 rounded-2xl w-15 p-3 mb-3">
                <h2 class="text-2xl">Clareamento</h2>
                <p>Tecnologia LED para um sorriso mais branco e radiante</p>
            </div>

            <div class="bg-white p-8 rounded-xl w-90 shadow-md hover:shadow-xl transition-shadow">
                <img src="{{ asset('img/shield.png') }}" class="bg-green-500 rounded-2xl w-15 p-3 mb-3">
                <h2 class="text-2xl">Implantes</h2>
                <p>Implantes de última geração com garantia e conforto</p>
            </div>

            <div class="bg-white p-8 rounded-xl w-90 shadow-md hover:shadow-xl transition-shadow">
                <img src="{{ asset('img/medal.png') }}" class="bg-orange-500 rounded-2xl w-15 p-3 mb-3">
                <h2 class="text-2xl">Ortodontia</h2>
                <p>Aparelhos modernos para alinhar seu sorriso perfeitamente</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center items-center mt-32">
        <h1 class="text-5xl">Depoimento de clientes</h1>
        <p>Avaliações reais de quem confia na DentalLux</p>

        <div class="flex flex-wrap justify-center gap-10 mt-8">
            <div class="flex flex-col justify-between bg-white shadow-md hover:shadow-2xl transition-shadow rounded-xl p-5 w-90 h-50">
                <h2>⭐⭐⭐⭐⭐</h2>
                <p>"Atendimento excepcional! Equipe super atendiosa e resultados incríveis."</p>
                <div class="flex gap-2 items-center">
                    <img src="{{ asset('img/userIcon.png') }}" class="w-12">
                    <div class="gap-0">
                        <h2>Maria Silva</h2>
                        <p>Paciente</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-between bg-white shadow-md hover:shadow-2xl transition-shadow rounded-xl p-5 w-90 h-50">
                <h2>⭐⭐⭐⭐⭐</h2>
                <p>"Melhor clínica que já frequentei, Tecnologia de ponta e profissionais qualificados."</p>
                <div class="flex gap-2 items-center">
                    <img src="{{ asset('img/userIcon.png') }}" class="w-12">
                    <div class="gap-0">
                        <h2>João Santos</h2>
                        <p>Paciente</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-between bg-white shadow-md hover:shadow-2xl transition-shadow rounded-xl p-5 w-90 h-50">
                <h2>⭐⭐⭐⭐⭐</h2>
                <p>"Fiz meu clareamento aqui e adorei o resultado. Super recomendo!"</p>
                <div class="flex gap-2 items-center">
                    <img src="{{ asset('img/userIcon.png') }}" class="w-12">
                    <div class="gap-0">
                        <h2>Ana Costa</h2>
                        <p>Paciente</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-linear-to-r from-sky-300 to-sky-500 flex flex-col items-center p-12 mt-16">
        <h1 class="text-white mb-1">Pronto para transformar seu sorriso?</h1>
        <p class="text-white mb-5">Agende sua consulta agora e dê o primeiro passo para um sorriso mais saudável</p>

        <a href="#" class="button bg-white text-sky-500 border-0 shadow-md hover:bg-blue-300 hover:text-white">Agendar Minha Consulta</a>
    </div>

@endsection