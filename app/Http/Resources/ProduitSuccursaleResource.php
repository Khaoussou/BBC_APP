<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitSuccursaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "succursale" => $this->succursale->nom,
            "libelle" => $this->produit->libelle,
            "description" => $this->produit->description,
            "image" => $this->produit->image,
            "code" => $this->produit->code,
            "quantite" => $this->quantite,
            "succursale_id" => $this->id,
            "prixUnitaire" => $this->prix_unitaire,
            "prixPromo" => $this->prix_promo,
            "caracteristique" => new ProduitAmiResource($this->produit),
        ];
    }
}
