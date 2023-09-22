<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccursaleRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'adresse' => $this->adresse,
            'telephone' => $this->telephone,
            'reduction' => $this->reduction,
            'produits' => $this->succursaleProduits->map(function ($succursaleProduit) {
                return [
                    'id' => $succursaleProduit->id,
                    'libelle' => $succursaleProduit->produit->libelle,
                    'image' => $succursaleProduit->produit->image,
                    'prix' => $succursaleProduit->prix_produit,
                    'quantite' => $succursaleProduit->quantite,
                    'prix_gros' => $succursaleProduit->prix_gros,
                    'code_barre' => $succursaleProduit->produit->code,
                    'caracteristiques' => $succursaleProduit->produit->produitCaracteristiques->map(function ($produitCaracteristique) {
                        return [
                            'id' => $produitCaracteristique->id,
                            'valeur' => $produitCaracteristique->valeur,
                            'libelle' => $produitCaracteristique->caracteristique->libelle,
                        ];
                    }),
                ];
            }),
            'amis' => $this->amis->map(function ($ami) {
                return [
                    'id' => $ami->id,
                    'nom' => $ami->nom,
                    'telephone' => $ami->telephone,
                    'reduction' => $ami->reduction,
                    'produits' => $ami->succursaleProduits->map(function ($succursaleProduit) {
                        return [
                            'id' => $succursaleProduit->id,
                            'libelle' => $succursaleProduit->produit->libelle,
                            'image' => $succursaleProduit->produit->image,
                            'prix' => $succursaleProduit->prix_produit,
                            'quantite' => $succursaleProduit->quantite,
                            'prix_gros' => $succursaleProduit->prix_gros,
                            'code_barre' => $succursaleProduit->produit->code,
                            'caracteristiques' => $succursaleProduit->produit->produitCaracteristiques->map(function ($produitCaracteristique) {
                                return [
                                    'id' => $produitCaracteristique->id,
                                    'valeur' => $produitCaracteristique->valeur,
                                    'libelle' => $produitCaracteristique->caracteristique->libelle,
                                ];
                            }),
                        ];
                    }),
                ];
            })
        ];
    }
}
