@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-center mb-8">Bienvenido a la aplicación</h1>
        <div class="grid md:grid-cols-2 gap-6">

            <!-- Cliente API GoT -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-semibold mb-4">Cliente API GoT</h2>
                <p class="mb-6">Explora personajes y casas de Game of Thrones.</p>
                <a href="{{ route('got.characters.index') }}"
                   class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Ver personajes
                </a>
            </div>

            <!-- Proveedor de API -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-semibold mb-4">API REST - Productos de Limpieza</h2>
                <p class="mb-4 text-gray-700">API completa con autenticación Laravel Sanctum y CRUD de productos.</p>

                <div class="bg-gray-50 rounded p-4 mb-4">
                    <h3 class="font-semibold mb-2">Funcionalidades:</h3>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Autenticación con tokens Bearer</li>
                        <li>• CRUD completo de productos</li>
                        <li>• 10 endpoints funcionales</li>
                        <li>• Base de datos con productos de ejemplo</li>
                    </ul>
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded p-3">
                    <p class="text-sm text-blue-800">
                        <strong>Endpoint base:</strong> <code class="bg-white px-1 rounded">/api/productos-limpieza</code>
                    </p>
                    <p class="text-sm text-blue-700 mt-1">
                        Accesible vía herramientas como Postman o HTTPClient
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
