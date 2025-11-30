@extends('layout')

@section('content')

    <div class="w-full flex items-center flex-col mt-6">

        <div class="bg-white rounded-lg mt-6 p-6 w-8/10 max-w-180 relative overflow-hidden shadow">
            <div class="flex flex-col">
                <div class="bg-sky-500 p-4 w-200 flex relative -top-6 -left-6">
                    <img src="{{ asset('img/agenda.png') }}" class="w-6 mr-2">
                    <h2 class="text-white">Dados da consulta</h2>
                </div>
                
                <div class="">
                    <h2>Serviço Selecionado: {{ $appointment->service->type }}</h2>
                    <h2 class="text-gray-600 font-normal">{{ ucfirst($appointment->date->dayName) }}, {{ $appointment->date->day }} de {{ ucfirst($appointment->date->monthName) }} 2025 às {{ $appointment->time->format('H:i') }}</h2>
                </div>
                <div class="border-y border-gray-300 py-3 my-5 flex justify-between">
                    <h2>Preço</h2>
                    <h2>R${{ number_format($appointment->service->price, 2, ',', '.') }}</h2>
                </div>

                <div class="py-3 flex justify-between">
                    <h2>Status do pagamento:</h2>
                    <h2>{{ $appointment->payment }}</h2>
                </div>
                  
                @if($appointment->payment == 'pendente')
                    <a href="{{ route('payment.create', ['appointment' => $appointment->id]) }}" class="button mt-2 flex justify-center bg-sky-400 text-white hover:opacity-80" id="linkPagamento">Pagar agora</a>
                @endif
                
                <div class="flex justify-between gap-2 items-center h-10">
                    <a href="{{ route('appointment.edit', ['appointment' => $appointment->id]) }}" class="button mt-5 flex justify-center bg-yellow-400 text-white hover:opacity-80 w-1/2" id="linkPagamento">Editar</a>
                    <form action="{{ route('appointment.destroy', ['appointment' => $appointment->id]) }}" class="w-1/2" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="button mt-5 flex justify-center bg-red-400 text-white hover:opacity-80 w-full" id="linkPagamento">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection