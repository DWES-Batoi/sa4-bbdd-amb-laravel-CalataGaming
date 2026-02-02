<?php

namespace App\Http\Controllers;

use App\Models\Partit;
use App\Models\Equip;
use App\Models\Estadi;
use Illuminate\Http\Request;

class PartitController extends Controller
{
    public function index()
    {
        $partits = Partit::with(['local', 'visitant', 'estadi'])->get();
        return view('partits.index', compact('partits'));
    }

    public function create()
    {
        $equips = Equip::all();
        $estadis = Estadi::all();
        return view('partits.create', compact('equips', 'estadis'));
    }

    public function store(\App\Http\Requests\PartitRequest $request)
    {
        Partit::create($request->validated());
        return redirect()->route('partits.index')->with('success', 'Partit creat!');
    }

    public function show(Partit $partit)
    {
        // Esta versión es la correcta porque carga los nombres de los equipos
        $partit->load(['local', 'visitant', 'estadi']);
        return view('partits.show', compact('partit'));
    }

    public function edit(Partit $partit)
    {
        $equips = Equip::all();
        $estadis = Estadi::all();
        return view('partits.edit', compact('partit', 'equips', 'estadis'));
    }

    public function update(\App\Http\Requests\PartitRequest $request, Partit $partit)
    {
        $partit->update($request->validated());
        return redirect()->route('partits.index')->with('success', 'Partit actualitzat correctament');
    }

    public function destroy(Partit $partit)
    {
        $partit->delete();
        return redirect()->route('partits.index');
    }
}