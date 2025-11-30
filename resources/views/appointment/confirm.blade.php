@extends('layout')

@section('content')

    <div class="w-full flex items-center flex-col mt-6">
        <h1 class="mb-1">Confirmar Consulta</h1>
        <p>Confirme a data e escolha a opção de pagamento</p>

        <div class="bg-white rounded-lg mt-6 p-6 w-8/10 max-w-180 relative overflow-hidden shadow">
            <div class="flex flex-col">
                <div class="bg-sky-500 p-4 w-200 flex relative -top-6 -left-6">
                    <img src="{{ asset('img/agenda.png') }}" class="w-6 mr-2">
                    <h2 class="text-white">Dados de pagamento</h2>
                </div>
                
                <div class="">
                    <h2>Serviço Selecionado: {{ $appointment->service->type }}</h2>
                    <h2 class="text-gray-600 font-normal">{{ ucfirst($appointment->date->dayName) }}, {{ $appointment->date->day }} de {{ ucfirst($appointment->date->monthName) }} 2025 às {{ $appointment->time->format('H:i') }}</h2>
                </div>
                <div class="border-y border-gray-300 py-3 my-5 flex justify-between">
                    <h2>Preço</h2>
                    <h2>R${{ number_format($appointment->service->price, 2, ',', '.') }}</h2>
                </div>
                <div class="flex flex-col">
                    <h2 class="mb-3">Método de pagamento</h2>

                    <div class="flex items-center">
                        <input type="radio" name="payment" id="now" value="now" class="size-4.5" checked>
                        <label for="now" class="ml-2 text-lg font-semibold text-gray-700">Pagar agora</label>
                    </div>
                    <div class="mb-1 flex items-center">
                        <input type="radio" name="payment" id="consult" value="consult" class="size-4.5">
                        <label for="consult" class="ml-2 text-lg font-semibold text-gray-700">Pagar no consultório</label>
                    </div>
                </div>
                <a href="{{ route('payment.create', ['appointment' => $appointment->id]) }}" class="button mt-5 flex justify-center bg-sky-400 text-white hover:opacity-80" id="linkPagamento">Confirmar</a>
            </div>
    </div>

    <script>

        document.querySelectorAll('input[name="payment"]').forEach(radio => {
            radio.addEventListener('change', function () {
                const link = document.getElementById('linkPagamento')

                if (this.value === 'now') {
                    link.href = "{{ route('payment.create', ['appointment' => $appointment->id]) }}"
                } else if (this.value === 'consult') {
                    link.href = "{{ route('appointment.index') }}"
                }
            })
        })

    </script>

@endsection