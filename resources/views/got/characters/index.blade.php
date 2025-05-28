@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Personajes</h1>
        <ul class="space-y-2">
            @foreach ($characters as $character)
                <li>
                    <a href="{{ route('got.characters.show', ['slug' => $character['slug']]) }}"
                       class="text-blue-600 hover:underline">
                        {{ $character['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
