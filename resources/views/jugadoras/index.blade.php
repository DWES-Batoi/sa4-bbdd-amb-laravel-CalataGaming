@extends('layouts.equip')
@section('title', __('Llistat de Jugadores'))

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">{{ __('Llistat de Jugadores') }}</h1>
        @auth
            @if(Auth::user()->role == 'administrador')
                <a href="{{ route('jugadoras.create') }}" class="btn btn--primary">
                    {{ __('+ Nova Jugadora') }}
                </a>
            @endif
        @endauth
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($jugadoras as $jugadora)
            <div class="relative group">
                <x-jugadora :jugadora="$jugadora" />
                
                <div class="mt-4 flex justify-center gap-2">
                    <a href="{{ route('jugadoras.show', $jugadora->id) }}" class="btn btn--ghost text-xs py-1 px-2">{{ __('Veure') }}</a>
                    @auth @if(Auth::user()->role == 'administrador')
                        <a href="{{ route('jugadoras.edit', $jugadora->id) }}" class="btn btn--primary text-xs py-1 px-2">{{ __('Edit') }}</a>
                        <form action="{{ route('jugadoras.destroy', $jugadora->id) }}" method="POST" onsubmit="return confirm('{{ __('Segur?') }}')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn--danger text-xs py-1 px-2">{{ __('X') }}</button>
                        </form>
                    @endif @endauth
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 py-10">
                {{ __('No hi ha jugadores registrades.') }}
            </div>
        @endforelse
    </div>
</div>
@endsection