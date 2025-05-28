@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">{{ $house['name'] }}</h1>
        <h2 class="text-xl font-semibold mb-2">Miembros</h2>
        <ul class="space-y-4">
            @foreach ($house['members'] as $member)
                <li class="bg-white rounded shadow p-4">
                    <h3 class="font-semibold">{{ $member['name'] }}</h3>
                    @if (count($member['quotes']))
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            @foreach ($member['quotes'] as $quote)
                                <li>"{{ $quote }}"</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">Sin frases disponibles.</p>
                    @endif
                </li>
            @endforeach
        </ul>
        <a href="{{ route('got.houses.index') }}"
           class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            ← Volver a casas
        </a>
    </div>
@endsection
