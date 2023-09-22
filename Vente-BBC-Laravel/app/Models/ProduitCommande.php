<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProduitCommande extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'produit_id',
        'commande_id',
        'quantite',
        'prix_vente',
        'reduction'
    ];
}
