@extends('layouts.equip')
@section('title', __("Guia d'Equips"))

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">{{ __("Guia d'Equips") }}</h1>
        @auth
            @if(Auth::user()->role == 'administrador')
                <a href="{{ route('equips.create') }}" class="btn btn--primary">
                    {{ __('Crear Equip') }}
                </a>
            @endif
        @endauth
    </div>

    <div class="grid-cards">
        @foreach ($equips as $equip)
            <article class="card">
                <header class="card__header" style="display: flex; align-items: center; gap: 12px;">
                    @if ($equip->escut)
                        <img src="{{ asset('storage/' . $equip->escut) }}" 
                             alt="{{ __('Escut de') }} {{ $equip->nom }}" 
                             class="h-12 w-12 object-cover rounded-full border">
                    @else
                        <div class="h-12 w-12 bg-gray-200 rounded-full flex items-center justify-center text-xs text-gray-400 border">
                            {{ __('Sin Escut') }}
                        </div>
                    @endif

                    <div>
                        <h2 class="card__title font-bold">{{ $equip->nom }}</h2>
                        <span class="card__badge">{{ __('ID') }}: {{ $equip->id }}</span>
                    </div>
                </header>

                <div class="card__body">
                    <p><strong>{{ __('Estadi') }}:</strong> {{ $equip->estadi->nom ?? __('Sense estadi') }}</p>
                    <p><strong>{{ __('Titols') }}:</strong> {{ $equip->titols ?? '0' }}</p>
                </div>

                <footer class="card__footer">
                    <a class="btn btn--ghost" href="{{ route('equips.show', $equip) }}">{{ __('Veure') }}</a>
                    @auth
                        @if(Auth::user()->role == 'administrador')
                            <a class="btn btn--primary" href="{{ route('equips.edit', $equip) }}">{{ __('Editar') }}</a>
                            <form method="POST" action="{{ route('equips.destroy', $equip) }}" class="inline" onsubmit="return confirm('{{ __('Segur que vols eliminar aquest equip?') }}')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn--danger" type="submit">{{ __('Eliminar') }}</button>
                            </form>
                        @endif
                    @endauth
                </footer>
            </article>
        @endforeach
    </div>
</div>
@endsection