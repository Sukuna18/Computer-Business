<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRessource extends JsonResource
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
            'telephone' => $this->telephone,
            'password' => $this->password,
            'poste' => $this->poste,
            'login' => $this->login,
            'succursale' => $this->succursale->nom,
            'succursale_id' => $this->succursale->id,
            'succursale_telephone' => $this->succursale->telephone,
            'succursale_adresse' => $this->succursale->adresse,
            'produits' => $this->succursale->succursaleProduits->map(function ($succursaleProduit) {
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
            'amis' => $this->succursale->amis->map(function ($ami) {
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
