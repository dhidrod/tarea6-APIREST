@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-4">{{ $character['name'] }}</h1>

        <p class="mb-6">
            <span class="font-semibold">Casa:</span>
            <span class="text-gray-700">{{ $character['house']['name'] ?? 'Desconocida' }}</span>
        </p>

        <h2 class="text-2xl font-semibold mb-2">Frases</h2>
        <ul class="list-disc list-inside space-y-2 mb-6">
            @forelse ($character['quotes'] as $quote)
                <li class="bg-white p-4 rounded shadow">
                    "{{ $quote }}"
                </li>
            @empty
                <li class="text-gray-500">No hay frases disponibles.</li>
            @endforelse
        </ul>

        <a href="{{ route('got.characters.index') }}"
           class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            ← Volver a personajes
        </a>
    </div>
@endsection
