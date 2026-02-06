<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\PersonnelResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'personnel_id' => $this->personnel_id,
            'personnel' => new PersonnelResource($this->whenLoaded('personnel')),
            'nom' => $this->nom,
            'description' => $this->description,
            'type' => $this->type,
            'prix' => $this->prix,
            'montant_total' => $this->montant_total,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
