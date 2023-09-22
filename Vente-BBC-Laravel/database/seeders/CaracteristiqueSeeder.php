<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaracteristiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $caracteristique = [
            [
                'id' => 1,
                'libelle' => 'Couleur',
            ],
            [
                'id' => 2,
                'libelle' => 'Taille',
            ],
            [
                'id' => 3,
                'libelle' => 'Ram',
            ],
            [
                'id' => 4,
                'libelle' => 'Disque',
            ]
        ];
        \App\Models\Caracteristique::insert($caracteristique);
    }
}
