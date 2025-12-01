@extends('layout')

@section('content')

    <div class="flex flex-wrap justify-center items-center gap-3">
        @forelse ($appointments as $appointment)
            <div class="bg-white p-4 rounded-md flex flex-col w-80 h-60">
                <h2 class="text-4xl text-center">{{ $appointment->service->type }}</h2>
                <div class="mt-1 ml-2">
                    <h3 class="text-xl">{{ $appointment->date->format('d/m/Y') }}</h3>
                    <h3 class="text-xl">{{ $appointment->time->format('H:i') }}</h3>
                </div>

                <a href="{{ route('appointment.show', ['appointment'=> $appointment->id ]) }}" class="button mt-auto bg-sky-400 text-white">Gerenciar</a>
            </div>
        @empty
            <h2>Nenhuma consulta encontrada</h2>
        @endforelse
    </div>

@endsection