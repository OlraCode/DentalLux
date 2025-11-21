@extends('layout')

@section('content')

    <div class="w-full flex items-center flex-col mt-6">
        <h1 class="mb-1">Agendar consulta</h1>
        <p>Defina o horário e escolha o serviço</p>

        <div class="bg-white rounded-lg mt-6 p-6 w-8/10 max-w-180 relative overflow-hidden">
            <div class="bg-sky-500 p-4 w-200 flex relative -top-6 -left-6">
                <img src="{{ asset('img/agenda.png') }}" class="w-6 mr-2">
                <h2 class="text-white">Dados do Agendamento</h2>
            </div>
            <form action="{{ route('appointment.store') }}" method="post" class="flex flex-col gap-5">
                @csrf
                <div class="flex flex-col">
                    <label for="service" class="font-semibold">Tipo de serviço*</label>
                    <select name="service" id="service">
                        <option>Selecione o serviço</option>
                        <option value="2">Clareamento</option>
                        <option value="1">Geral</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label for="date" class="font-semibold">Data preferida*</label>
                    <select name="date" id="date">
                        <option>Data</option>
                        <option value="14/11/2025">14/11</option>
                        <option value="15/11/2025">15/11</option>
                        <option value="16/11/2025">16/11</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label for="time" class="font-semibold">Horário preferido*</label>
                    <select name="time" id="time">
                        <option>Horário</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label for="obs">Observações (opcional)</label>
                    <textarea class="mt-1 border border-gray-300 p-1 rounded-md" name="observations" id="obs" cols="30" rows="4" placeholder="Alguma informação adicional que devemos saber?"></textarea>
                    <x-input-error :messages="$errors->get('observations')" class="mt-2" />
                </div>

                <button type="submit" class="button flex justify-center bg-sky-400 text-white hover:opacity-80">Prosseguir</button>
            </form>
        </div>
    </div>

@endsection