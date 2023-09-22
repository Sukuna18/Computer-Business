<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Succursale extends Model
{
    use HasFactory, SoftDeletes;
    public function succursaleProduits()
    {
        return $this->hasMany(SuccursaleProduit::class);
    }
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'succursale_produits');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function amis()
    {
        return $this->belongsToMany(Succursale::class, 'amis', 'succursale1', 'succursale2');
    }
}
