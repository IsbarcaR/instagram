@extends('layout.app')

@section('name')
{{ auth()->user()->name }}
@endsection

@section('content')
<section id="boutique" class="container py-12 mx-auto px-4">
    <!-- Grid responsive: 1 columna en mobile, 2 en sm, 3 en md, 4 en lg -->
    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($fotos as $foto)
        <!-- Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">
            <!-- Imagen -->
            <div class="relative w-full h-48">
                <img src="{{ Storage::url($foto->path) }}" 
                     alt="{{ $foto->nombre }}" 
                     class="w-full h-full object-cover">
            </div>
            
            <!-- Contenido de la card -->
            <div class="p-6 text-center">
                <!-- Título -->
                <h1 class="text-xl font-bold text-gray-800 mb-2">{{ $foto->nombre }}</h1>

                <!-- Información del usuario -->
                <p class="text-gray-600 mb-4">Subido por: 
                    <span class="font-semibold text-gray-700">{{ $foto->user->name }}</span>
                </p>

                <!-- Botón de acción -->
                <a href="{{ route('fotos.show', $foto->id) }}" 
                   class="inline-block px-6 py-2 bg-purple-500 text-white font-medium rounded-md hover:bg-purple-600 focus:ring focus:ring-purple-300 focus:outline-none transition">
                    Mostrar
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
