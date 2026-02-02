@extends('layouts.equip')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Crear Nou Partit</h1>

    <form action="{{ route('partits.store') }}" method="POST" class="space-y-4 bg-white p-6 shadow rounded-lg">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Equipo Local --}}
            <div>
                <label class="block font-bold">Equip Local:</label>
                <select name="local_id" class="border p-2 w-full rounded">
                    @foreach($equips as $equip)
                        <option value="{{ $equip->id }}">{{ $equip->nom }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Equipo Visitante --}}
            <div>
                <label class="block font-bold">Equip Visitant:</label>
                <select name="visitant_id" class="border p-2 w-full rounded">
                    @foreach($equips as $equip)
                        <option value="{{ $equip->id }}">{{ $equip->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block font-bold">Estadi:</label>
            <select name="estadi_id" class="border p-2 w-full rounded">
                @foreach($estadis as $estadi)
                    <option value="{{ $estadi->id }}">{{ $estadi->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block font-bold">Data:</label>
                <input type="date" name="data" class="border p-2 w-full rounded">
            </div>
            <div>
                <label class="block font-bold">Jornada:</label>
                <input type="number" name="jornada" class="border p-2 w-full rounded">
            </div>
            <div>
                <label class="block font-bold">Resultat (Gols):</label>
                <input type="text" name="gols" placeholder="Ex: 2-0" class="border p-2 w-full rounded">
            </div>
        </div>

        <div class="flex gap-2 pt-4">
            <button type="submit" class="btn btn--primary">Guardar Partit</button>
            <a href="{{ route('partits.index') }}" class="btn btn--ghost">Cancel·lar</a>
        </div>
    </form>
</div>
@endsection