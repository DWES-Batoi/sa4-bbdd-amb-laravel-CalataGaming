@extends('layouts.equip')
@section('title', __('Calendari de Partits'))

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">{{ __('Calendari de Partits') }}</h1>
        @auth
            @if(Auth::user()->role == 'administrador')
                <a href="{{ route('partits.create') }}" class="btn btn--primary">
                    {{ __('+ Nou Partit') }}
                </a>
            @endif
        @endauth
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse ($partits as $partit)
            <div class="relative group">
                <x-partit :partit="$partit" />

                <div class="mt-2 flex justify-end gap-2 px-4">
                    <a href="{{ route('partits.show', $partit->id) }}" class="text-xs font-bold text-blue-600 uppercase hover:underline">{{ __('Detalls') }}</a>
                    @auth @if(Auth::user()->role == 'administrador')
                        <a href="{{ route('partits.edit', $partit->id) }}" class="text-xs font-bold text-yellow-600 uppercase hover:underline">{{ __('Editar') }}</a>
                        <form action="{{ route('partits.destroy', $partit->id) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Segur?') }}')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs font-bold text-red-600 uppercase hover:underline">{{ __('Eliminar') }}</button>
                        </form>
                    @endif @endauth
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 py-10">
                {{ __('No hi ha partits programats encara.') }}
            </div>
        @endforelse
    </div>
</div>
@endsection