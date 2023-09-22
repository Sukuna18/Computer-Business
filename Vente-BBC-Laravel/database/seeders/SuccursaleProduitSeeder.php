<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuccursaleProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produit_succursale = [
            [
                'id' => 1,
                'produit_id' => 1,
                'succursale_id' => 1,
                'prix_produit' => 1000000,
                'prix_gros' => 900000,
                'quantite' => 10,
            ],
            [
                'id' => 2,
                'produit_id' => 2,
                'succursale_id' => 1,
                'prix_produit' => 10000,
                'prix_gros' => 90000,
                'quantite' => 10,
            ],
            [
                'id' => 3,
                'produit_id' => 3,
                'succursale_id' => 1,
                'prix_produit' => 10000,
                'prix_gros' => 90000,
                'quantite' => 10,
            ],
            [
                'id' => 4,
                'produit_id' => 1,
                'succursale_id' => 2,
                'prix_produit' => 10000,
                'prix_gros' => 90000,
                'quantite' => 10,
            ],
            [
                'id' => 5,
                'produit_id' => 2,
                'succursale_id' => 2,
                'prix_produit' => 10000,
                'prix_gros' => 90000,
                'quantite' => 10,
            ],
            [
                'id' => 6,
                'produit_id' => 3,
                'succursale_id' => 2,
                'prix_produit' => 10000,
                'prix_gros' => 90000,
                'quantite' => 10,
            ]
        ];
        \App\Models\SuccursaleProduit::insert($produit_succursale);
    }
}
