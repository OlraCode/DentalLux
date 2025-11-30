@props(['type' => 'info', 'message' => ''])

@php
    $colors = [
        'success' => 'bg-green-100 border-green-500 text-green-700',
        'error' => 'bg-red-100 border-red-500 text-red-700',
        'warning' => 'bg-yellow-100 border-yellow-500 text-yellow-700',
        'info' => 'bg-blue-100 border-blue-500 text-blue-700',
    ];
@endphp

<div
    class="border-l-4 p-4 rounded-md shadow-sm w-8/10 mx-auto mt-3 {{ $colors[$type] }}"
>
    <div class="flex items-center justify-between">
        <p class="font-semibold">{{ $message }}</p>

        <button onclick="this.parentElement.parentElement.remove()"
                class="text-sm font-bold ml-4">×</button>
    </div>
</div>
