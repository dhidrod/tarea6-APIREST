<nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-xl font-semibold text-gray-900">
            API RESTFul
        </a>
        <ul class="flex space-x-4">
            <li><a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900">Inicio</a></li>
            <li><a href="{{ route('got.characters.index') }}" class="text-gray-700 hover:text-gray-900">Personajes</a></li>
            <li><a href="{{ route('got.houses.index') }}" class="text-gray-700 hover:text-gray-900">Casas</a></li>
        </ul>
    </div>
</nav>
