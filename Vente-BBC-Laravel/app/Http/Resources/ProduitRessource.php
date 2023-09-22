<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'libelle' => $this->libelle,
            'description' => $this->description,
            'image' => $this->image,
            'code' => $this->code,
        ];
        $data['succursales'] = $this->succursaleProduits->map(function ($succursaleProduit) {
            return [
                'quantite' => $succursaleProduit->quantite,
                'prix_gros' => $succursaleProduit->prix_gros,
                'prix' => $succursaleProduit->prix_produit,
                'succursale' => $succursaleProduit->succursale->nom,
            ];
        });
        return $data;
    }
}
