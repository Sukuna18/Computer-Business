<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProduitCaracteristique extends Model
{
    use HasFactory, SoftDeletes;
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function caracteristique()
    {
        return $this->belongsTo(Caracteristique::class);
    }
}
