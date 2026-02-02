<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartitResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'local_id' => $this->local_id,
            'local' => new EquipResource($this->whenLoaded('local')),
            'visitant_id' => $this->visitant_id,
            'visitant' => new EquipResource($this->whenLoaded('visitant')),
            'estadi_id' => $this->estadi_id,
            'estadi' => new EstadiResource($this->whenLoaded('estadi')),
            'data' => $this->data,
            'jornada' => $this->jornada,
            'gols' => $this->gols,
        ];
    }
}
