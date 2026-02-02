@extends('layouts.equip')

@section('content')
<h1>Afegir Jugadora</h1>

<form action="{{ route('jugadoras.store') }}" method="POST">
    @csrf
    <label>Nom:</label>
    <input type="text" name="nom" class="border p-2 w-full">

    <label>Dorsal:</label>
    <input type="number" name="dorsal" class="border p-2 w-full">

    <label>Equip:</label>
    <select name="equip_id" class="border p-2 w-full">
        @foreach($equips as $equip)
            <option value="{{ $equip->id }}">{{ $equip->nom }}</option>
        @endforeach
    </select>

    <label>Data Naixement:</label>
    <input type="date" name="data_naixement" class="border p-2 w-full">

    <button type="submit" class="bg-blue-500 text-white p-2 mt-4">Guardar</button>
</form>
@endsection