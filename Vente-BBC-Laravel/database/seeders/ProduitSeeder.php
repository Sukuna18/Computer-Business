<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produits = [
            [
                'id' => 1,
                'libelle' => 'Ordinateur portable',
                'code' => 'ORDP',
                'description' => 'Ordinateur portable',
                'image' => 'https://m.media-amazon.com/images/I/71+3oOMogwL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'id' => 2,
                'libelle' => 'Clavier',
                'code' => 'CLAV',
                'description' => 'Clavier',
                'image' => 'https://bakhbade.com/wp-content/uploads/2023/05/Design-sans-titre-16.png'
            ],
            [
                'id' => 3,
                'libelle' => 'Souris',
                'code' => 'SOUR',
                'description' => 'Souris',
                'image' => 'https://sold.ma/wp-content/uploads/2023/08/41mYp9lBT-S.jpg'
            ]
        ];
        \App\Models\Produit::insert($produits);
    }
}
