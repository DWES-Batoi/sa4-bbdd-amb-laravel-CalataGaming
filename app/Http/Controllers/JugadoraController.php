<?php

namespace App\Http\Controllers;

use App\Models\Jugadora;
use App\Models\Equip; 
use Illuminate\Http\Request;

class JugadoraController extends Controller
{
    /**
     * Muestra el listado de jugadoras con estilo de tarjetas.
     */
    public function index()
    {
        // Cargamos la relación 'equip' para mostrar el nombre en la tarjeta
        $jugadoras = Jugadora::with('equip')->get();
        return view('jugadoras.index', compact('jugadoras'));
    }

    /**
     * Muestra el formulario para crear una jugadora.
     */
    public function create()
    {
        $equips = Equip::all(); 
        return view('jugadoras.create', compact('equips'));
    }

    /**
     * Guarda la jugadora (incuyendo los 4 campos importantes).
     */
    public function store(\App\Http\Requests\JugadoraRequest $request)
    {
        Jugadora::create($request->validated());

        return redirect()->route('jugadoras.index')->with('success', 'Jugadora creada!');
    }

    /**
     * Muestra la ficha detallada de una jugadora.
     */
    public function show(string $id)
    {
        $jugadora = Jugadora::with('equip')->findOrFail($id);
        return view('jugadoras.show', compact('jugadora'));
    }

    /**
     * MÉTODO NUEVO: Formulario de edición.
     */
    public function edit(string $id)
    {
        $jugadora = Jugadora::findOrFail($id);
        $equips = Equip::all();
        return view('jugadoras.edit', compact('jugadora', 'equips'));
    }

    /**
     * MÉTODO NUEVO: Actualizar los datos.
     */
    public function update(\App\Http\Requests\JugadoraRequest $request, string $id)
    {
        $jugadora = Jugadora::findOrFail($id);
        $jugadora->update($request->validated());

        return redirect()->route('jugadoras.index')->with('success', 'Jugadora actualizada correctamente');
    }

    /**
     * Borra una jugadora.
     */
    public function destroy(string $id)
    {
        Jugadora::destroy($id);
        return redirect()->route('jugadoras.index')->with('success', 'Jugadora eliminada');
    }
}