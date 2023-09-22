<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model
{
    use HasFactory, SoftDeletes;
    public function succursaleProduits()
    {
        return $this->hasMany(SuccursaleProduit::class);
    }
    public function produitCaracteristiques()
    {
        return $this->hasMany(ProduitCaracteristique::class);
    }
}
