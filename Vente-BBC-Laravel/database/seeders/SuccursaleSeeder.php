<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuccursaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $succursale = [
            [
                'id' => 1,
                'nom' => 'Succursale 1',
                'telephone' => '123456789',
                'reduction' => 10,
                'adresse' => 'Adresse 1',
            ],
            [
                'id' => 2,
                'nom' => 'Succursale 2',
                'telephone' => '123456789',
                'reduction' => 10,
                'adresse' => 'Adresse 2',
            ],
            [
                'id' => 3,
                'nom' => 'Succursale 3',
                'telephone' => '123456789',
                'reduction' => 10,
                'adresse' => 'Adresse 3',
            ],
            [
                'id' => 4,
                'nom' => 'Succursale 4',
                'telephone' => '123456789',
                'reduction' => 10,
                'adresse' => 'Adresse 4',
            ]
        ];
        \App\Models\Succursale::insert($succursale);
    }
}
