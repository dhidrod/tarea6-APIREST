@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-center mb-8">Bienvenido a la aplicación</h1>
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-semibold mb-4">Cliente API GoT</h2>
                <p class="mb-6">Explora personajes y casas de Game of Thrones.</p>
                <a href="{{ route('got.characters.index') }}"
                   class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Ver personajes
                </a>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-semibold mb-4">Proveedor de API</h2>
                <p class="mb-6">Panel de administración de productos.</p>
                <button disabled class="inline-block px-4 py-2 bg-gray-400 text-white rounded cursor-not-allowed">
                    En construcción
                </button>
            </div>
        </div>
    </div>
@endsection
