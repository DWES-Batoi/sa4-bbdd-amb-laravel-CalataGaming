<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipRequest;
use App\Http\Resources\EquipResource;
use App\Models\Equip;

class EquipController extends Controller
{
    public function index()
    {
        return EquipResource::collection(Equip::query()->with('estadi')->paginate(10));
    }

    public function show(Equip $equip)
    {
        return new EquipResource($equip->load('estadi'));
    }

    public function store(EquipRequest $request)
    {
        $equip = Equip::create($request->validated());
        return response()->json(new EquipResource($equip->load('estadi')), 201);
    }

    public function update(EquipRequest $request, Equip $equip)
    {
        $equip->update($request->validated());
        return new EquipResource($equip->load('estadi'));
    }

    public function destroy(Equip $equip)
    {
        $equip->delete();
        return response()->noContent();
    }
}
