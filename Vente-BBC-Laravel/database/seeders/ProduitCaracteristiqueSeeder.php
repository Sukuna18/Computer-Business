<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitCaracteristiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'produit_id' => 1,
                'caracteristique_id' => 1,
                'valeur' => 'Noir',
            ],
            [
                'id' => 2,
                'produit_id' => 1,
                'caracteristique_id' => 2,
                'valeur' => '10 pouces',
            ],
            [
                'id' => 3,
                'produit_id' => 1,
                'caracteristique_id' => 3,
                'valeur' => '4 Go',
            ],
            [
                'id' => 4,
                'produit_id' => 1,
                'caracteristique_id' => 4,
                'valeur' => 'SSD',
            ],
            [
                'id' => 5,
                'produit_id' => 2,
                'caracteristique_id' => 1,
                'valeur' => 'Noir',
            ],
            [
                'id' => 6,
                'produit_id' => 3,
                'caracteristique_id' => 1,
                'valeur' => 'Blanc',
            ]

        ];
        \App\Models\ProduitCaracteristique::insert($data);
    }
}
