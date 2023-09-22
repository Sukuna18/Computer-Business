<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class amis extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'succursale1',
        'succursale2',
    ];
    public function succursale()
    {
        return $this->belongsTo(Succursale::class);
    }
}
