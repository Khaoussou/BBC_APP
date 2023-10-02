<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "libelle" => $this->libelle,
            "description" => $this->description,
            "code" => $this->code,
            "image" => $this->image,
            "succursale_id" => ProduitSuccursaleResource::collection($this->produitSuccursale)[0]->id,
            "quantite" => ProduitSuccursaleResource::collection($this->produitSuccursale)[0]->quantite,
            "prixUnitaire" => ProduitSuccursaleResource::collection($this->produitSuccursale)[0]->prix_unitaire,
            "prixPromo" => ProduitSuccursaleResource::collection($this->produitSuccursale)[0]->prix_promo,
            "caracteristique" => ["caracteristique" => CaractProduitResource::collection($this->produitCaract)],
        ];
    }
}
