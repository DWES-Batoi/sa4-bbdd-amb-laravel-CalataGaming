<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartitRequest;
use App\Http\Resources\PartitResource;
use App\Models\Partit;

class PartitController extends Controller
{
    public function index()
    {
        return PartitResource::collection(Partit::query()->with(['local', 'visitant', 'estadi'])->paginate(10));
    }

    public function show(Partit $partit)
    {
        return new PartitResource($partit->load(['local', 'visitant', 'estadi']));
    }

    public function store(PartitRequest $request)
    {
        $partit = Partit::create($request->validated());
        return response()->json(new PartitResource($partit->load(['local', 'visitant', 'estadi'])), 201);
    }

    public function update(PartitRequest $request, Partit $partit)
    {
        $partit->update($request->validated());
        return new PartitResource($partit->load(['local', 'visitant', 'estadi']));
    }

    public function destroy(Partit $partit)
    {
        $partit->delete();
        return response()->noContent();
    }
}
