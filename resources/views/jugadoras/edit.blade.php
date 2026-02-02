@extends('layouts.equip')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Jugadora: {{ $jugadora->nom }}</h1>

    <form action="{{ route('jugadoras.update', $jugadora->id) }}" method="POST" class="space-y-4 bg-white p-6 shadow rounded-lg">
        @csrf
        @method('PUT') {{-- MUY IMPORTANTE PARA EDITAR --}}

        <div>
            <label class="block font-bold">Nombre:</label>
            <input type="text" name="nom" value="{{ old('nom', $jugadora->nom) }}" class="border p-2 w-full rounded">
        </div>

        <div>
            <label class="block font-bold">Dorsal:</label>
            <input type="number" name="dorsal" value="{{ old('dorsal', $jugadora->dorsal) }}" class="border p-2 w-full rounded">
        </div>

        <div>
            <label class="block font-bold">Equipo:</label>
            <select name="equip_id" class="border p-2 w-full rounded">
                @foreach($equips as $equip)
                    <option value="{{ $equip->id }}" {{ $jugadora->equip_id == $equip->id ? 'selected' : '' }}>
                        {{ $equip->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-bold">Fecha de Nacimiento:</label>
            <input type="date" name="data_naixement" value="{{ old('data_naixement', $jugadora->data_naixement) }}" class="border p-2 w-full rounded">
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('jugadoras.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
        </div>
    </form>
</div>
@endsection