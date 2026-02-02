@extends('layouts.equip')

@section('content')
<div class="container mx-auto">
    <h1 class="title text-3xl font-bold mb-6">Detall del Partit</h1>

    <article class="card" style="max-width: 600px; margin: 0 auto;">
        <header class="card__header">
            <div>
                <h2 class="card__title font-bold text-2xl">Jornada {{ $partit->jornada }}</h2>
                <p class="text-gray-500">{{ $partit->data }}</p>
            </div>
            <span class="card__badge" style="font-size: 1.5rem; padding: 10px 20px;">
                {{ $partit->gols }}
            </span>
        </header>

        <div class="card__body text-center py-8">
            <div style="display: flex; justify-content: space-around; align-items: center; gap: 20px;">
                <div>
                    <p class="text-xl font-bold">{{ $partit->local->nom }}</p>
                    <span class="card__badge">Local</span>
                </div>
                <div class="text-3xl font-black text-gray-300">VS</div>
                <div>
                    <p class="text-xl font-bold">{{ $partit->visitant->nom }}</p>
                    <span class="card__badge">Visitant</span>
                </div>
            </div>

            <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                <p><strong>Estadi:</strong> {{ $partit->estadi->nom }}</p>
                <p><strong>Localitat:</strong> {{ $partit->estadi->ciutat ?? '—' }}</p>
            </div>
        </div>

        <footer class="card__footer" style="justify-content: center; gap: 15px;">
            <a href="{{ route('partits.index') }}" class="btn btn--ghost">Tornar al llistat</a>
            <a href="{{ route('partits.edit', $partit->id) }}" class="btn btn--primary">Editar dades</a>
        </footer>
    </article>
</div>
@endsection