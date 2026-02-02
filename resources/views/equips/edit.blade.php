@extends('layouts.equip')
@section('title', "Editar equip")

@section('content')
<div class="container mx-auto p-6">
    <h1 class="title text-3xl font-bold mb-6">Editar Equip: {{ $equip->nom }}</h1>

    <div class="card">
        {{-- Es vital incluir enctype="multipart/form-data" para subir el escut --}}
        <form action="{{ route('equips.update', $equip) }}" method="POST" enctype="multipart/form-data" class="card__body space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-bold mb-1">Nom de l'equip</label>
                <input type="text" name="nom" value="{{ old('nom', $equip->nom) }}" class="btn btn--ghost w-full text-left">
                @error('nom') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-bold mb-1">Estadi</label>
                <select name="estadi_id" class="btn btn--ghost w-full text-left">
                    @foreach($estadis as $estadi)
                        <option value="{{ $estadi->id }}" @selected(old('estadi_id', $equip->estadi_id) == $estadi->id)>
                            {{ $estadi->nom }}
                        </option>
                    @endforeach
                </select>
                @error('estadi_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-bold mb-1">Títols</label>
                <input type="number" name="titols" value="{{ old('titols', $equip->titols) }}" class="btn btn--ghost w-full text-left">
                @error('titols') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Sección del Escudo --}}
            <div class="mt-4 p-4 border rounded-lg bg-gray-50">
                <label class="block font-bold mb-2">Escut de l'equip</label>
                
                @if($equip->escut)
                    <div class="flex items-center gap-4 mb-3">
                        <img src="{{ asset('storage/' . $equip->escut) }}" class="h-16 w-16 object-cover rounded-full border shadow-sm" alt="Escut actual">
                        <p class="text-sm text-gray-500">Escut actual</p>
                    </div>
                @endif

                <input type="file" name="escut" class="btn btn--ghost w-full">
                <p class="text-xs text-gray-400 mt-1">Deixa-ho buit per mantenir l'actual (Formats: jpg, png, max 2MB).</p>
                @error('escut') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="card__footer mt-6 flex gap-2">
                <button type="submit" class="btn btn--primary">Desar Canvis</button>
                <a href="{{ route('equips.index') }}" class="btn btn--ghost">Cancel·lar</a>
            </div>
        </form>
    </div>
</div>
@endsection