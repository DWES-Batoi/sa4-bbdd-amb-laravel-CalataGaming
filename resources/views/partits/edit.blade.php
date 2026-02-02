@extends('layouts.equip')

@section('content')
<div class="container mx-auto">
    <h1 class="title text-2xl font-bold mb-4">Editar Partit</h1>

    <div class="card">
        <form action="{{ route('partits.update', $partit->id) }}" method="POST" class="card__body">
            @csrf
            @method('PUT')

            <div class="grid-cards" style="grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label class="block font-bold">Equip Local</label>
                    <select name="local_id" class="btn btn--ghost w-full">
                        @foreach($equips as $equip)
                            <option value="{{ $equip->id }}" {{ $partit->local_id == $equip->id ? 'selected' : '' }}>
                                {{ $equip->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-bold">Equip Visitant</label>
                    <select name="visitant_id" class="btn btn--ghost w-full">
                        @foreach($equips as $equip)
                            <option value="{{ $equip->id }}" {{ $partit->visitant_id == $equip->id ? 'selected' : '' }}>
                                {{ $equip->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <label class="block font-bold">Estadi</label>
                <select name="estadi_id" class="btn btn--ghost w-full">
                    @foreach($estadis as $estadi)
                        <option value="{{ $estadi->id }}" {{ $partit->estadi_id == $estadi->id ? 'selected' : '' }}>
                            {{ $estadi->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid-cards mt-4" style="grid-template-columns: 1fr 1fr 1fr;">
                <div>
                    <label class="block font-bold">Data</label>
                    <input type="date" name="data" value="{{ $partit->data }}" class="btn btn--ghost w-full">
                </div>
                <div>
                    <label class="block font-bold">Jornada</label>
                    <input type="number" name="jornada" value="{{ $partit->jornada }}" class="btn btn--ghost w-full">
                </div>
                <div>
                    <label class="block font-bold">Gols (Resultat)</label>
                    <input type="text" name="gols" value="{{ $partit->gols }}" class="btn btn--ghost w-full">
                </div>
            </div>

            <div class="card__footer mt-6">
                <button type="submit" class="btn btn--primary">Actualitzar Partit</button>
                <a href="{{ route('partits.index') }}" class="btn btn--ghost">Tornar</a>
            </div>
        </form>
    </div>
</div>
@endsection