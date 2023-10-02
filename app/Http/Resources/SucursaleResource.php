<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SucursaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "nom" => $this->nom,
            "telephone" => $this->telephone,
            "adresse" => $this->adresse,
            "reduction" => $this->reduction,
        ];
    }
}
