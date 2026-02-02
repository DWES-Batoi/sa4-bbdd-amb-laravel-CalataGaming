@extends('layouts.equip')

@section('title', 'Detall de la Jugadora')

@section('content')
<div class="container mx-auto p-6">
    <div class="mb-4">
        <a href="{{ route('jugadoras.index') }}" class="text-blue-500 hover:underline">← Tornar al llistat</a>
    </div>

    {{-- Usamos el estilo de tarjeta pero para una sola --}}
    <article class="card max-w-2xl mx-auto">
        <header class="card__header border-b pb-4 mb-4">
            <div>
                <h1 class="text-3xl font-bold text-blue-800">{{ $jugadora->nom }}</h1>
                <p class="text-gray-600 text-lg">Equip: {{ $jugadora->equip->nom ?? 'Sense equip' }}</p>
            </div>
            <span class="card__badge text-xl p-4">#{{ $jugadora->dorsal }}</span>
        </header>

        <div class="card__body flex flex-col md:flex-row gap-6">
            {{-- Sección de la Foto --}}
            <div class="w-full md:w-1/2">
                @if($jugadora->foto)
                    <img src="{{ asset('storage/' . $jugadora->foto) }}" alt="{{ $jugadora->nom }}" class="w-full rounded-lg shadow-md">
                @else
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg text-gray-400">
                        Sense Foto
                    </div>
                @endif
            </div>

            {{-- Datos específicos (Los 4 importantes) --}}
            <div class="w-full md:w-1/2 space-y-4">
                <div class="p-4 bg-blue-50 rounded-lg">
                    <p class="text-sm text-blue-600 font-bold uppercase">Data de Naixement</p>
                    <p class="text-xl">{{ $jugadora->data_naixement }}</p>
                </div>

                <div class="p-4 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-600 font-bold uppercase">Dorsal oficial</p>
                    <p class="text-xl">Número {{ $jugadora->dorsal }}</p>
                </div>

                <div class="p-4 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-600 font-bold uppercase">ID de l'Equip</p>
                    <p class="text-xl">{{ $jugadora->equip_id }}</p>
                </div>
            </div>
        </div>

        <footer class="card__footer mt-8 pt-4 border-t flex justify-end gap-2">
            <a href="{{ route('jugadoras.edit', $jugadora->id) }}" class="btn btn--primary">Editar Jugadora</a>
            
            <form action="{{ route('jugadoras.destroy', $jugadora->id) }}" method="POST" onsubmit="return confirm('Segur que vols esborrar-la?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn--danger">Eliminar</button>
            </form>
        </footer>
    </article>
</div>
@endsection