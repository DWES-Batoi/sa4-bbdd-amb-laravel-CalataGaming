<?php

namespace App\Http\Controllers;

use App\Models\Estadi;
use Illuminate\Http\Request;
use App\Http\Requests\EstadiRequest;

class EstadiController extends Controller
{
    // GET /estadis
    public function index()
    {
        $estadis = Estadi::all();
        return view('estadis.index', compact('estadis'));
    }

    // GET /estadis/{estadi}
    public function show(Estadi $estadi)
    {
        return view('estadis.show', compact('estadi'));
    }

    // GET /estadis/create
    public function create()
    {
        return view('estadis.create');
    }

    // POST /estadis
    public function store(\App\Http\Requests\EstadiRequest $request)
    {
        $estadi = new Estadi($request->validated());
        $estadi->save();

        return redirect()
            ->route('estadis.index')
            ->with('success', 'Estadi afegit correctament!');
    }

    // GET /estadis/{estadi}/edit
    public function edit(Estadi $estadi)
    {
        return view('estadis.edit', compact('estadi'));
    }

    // PUT/PATCH /estadis/{estadi}
    public function update(\App\Http\Requests\EstadiRequest $request, Estadi $estadi)
    {
        $estadi->update($request->validated());

        return redirect()
            ->route('estadis.index')
            ->with('success', 'Estadi actualitzat correctament!');
    }

    // DELETE /estadis/{estadi}
    public function destroy(Estadi $estadi)
    {
        $estadi->delete();

        return redirect()
            ->route('estadis.index')
            ->with('success', 'Estadi esborrat correctament!');
    }
}