@extends('layouts.equip')
@section('title', __("Guia d'Estadis"))

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-blue-800 dark:text-blue-400">{{ __("Guia d'Estadis") }}</h1>
    @auth
        @if(Auth::user()->role == 'administrador')
            <a href="{{ route('estadis.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
                {{ __('Nou Estadi') }}
            </a>
        @endif
    @endauth
</div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($estadis as $estadi)
            <div class="relative group">
                <x-estadi 
                    :nom="$estadi->nom" 
                    :capacitat="$estadi->capacitat" 
                    :equips="$estadi->equips"
                />
                
                <div class="mt-2 flex justify-end gap-2 px-2">
                    <a href="{{ route('estadis.show', $estadi->id) }}" class="text-xs font-bold text-blue-600 uppercase tracking-wide hover:underline">{{ __('Veure') }}</a>
                    @auth @if(Auth::user()->role == 'administrador')
                        <a href="{{ route('estadis.edit', $estadi->id) }}" class="text-xs font-bold text-yellow-600 uppercase tracking-wide hover:underline">{{ __('Editar') }}</a>
                        <form action="{{ route('estadis.destroy', $estadi->id) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Segur?') }}')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs font-bold text-red-600 uppercase tracking-wide hover:underline">{{ __('Eliminar') }}</button>
                        </form>
                    @endif @endauth
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection