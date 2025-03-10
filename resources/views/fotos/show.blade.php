@extends('layout.app')

@section('content')
<div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-lg">
    <!-- Imagen de la card -->
    <div class="relative w-full h-48">
        <img src="{{ Storage::url($foto->path) }}" 
             alt="{{ $foto->nombre }}" 
             class="w-full h-full object-cover">
    </div>

    <!-- Contenido de la card -->
    <div class="p-6">
        <!-- Título -->
        <h1 class="text-xl font-bold text-gray-800 mb-2">{{ $foto->nombre }}</h1>

        <!-- Información del usuario -->
        <p class="text-gray-600 mb-4">Subido por: 
            <span class="font-semibold text-gray-700">{{ $foto->user->name }}</span>
        </p>

        <!-- Botón de acción -->
        <a href="{{ route('fotos.edit', $foto->id) }}" 
           class="block w-full text-center px-4 py-2 bg-purple-500 text-white font-medium rounded-md hover:bg-purple-600 focus:ring focus:ring-purple-300 focus:outline-none transition">
            Editar
        </a>
    </div>
</div>
@endsection
