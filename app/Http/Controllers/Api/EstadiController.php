<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EstadiRequest;
use App\Http\Resources\EstadiResource;
use App\Models\Estadi;

class EstadiController extends Controller
{
    public function index()
    {
        return EstadiResource::collection(Estadi::query()->paginate(10));
    }

    public function show(Estadi $estadi)
    {
        return new EstadiResource($estadi);
    }

    public function store(EstadiRequest $request)
    {
        $estadi = Estadi::create($request->validated());
        return response()->json(new EstadiResource($estadi), 201);
    }

    public function update(EstadiRequest $request, Estadi $estadi)
    {
        $estadi->update($request->validated());
        return new EstadiResource($estadi);
    }

    public function destroy(Estadi $estadi)
    {
        $estadi->delete();
        return response()->noContent();
    }
}
