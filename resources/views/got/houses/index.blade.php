@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Casas</h1>
        <ul class="space-y-2">
            @foreach ($houses as $house)
                <li>
                    <a href="{{ route('got.houses.show', ['slug' => $house['slug']]) }}" class="text-blue-600 hover:underline">
                        {{ $house['name'] }} ({{ count($house['members']) }} miembros)
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
