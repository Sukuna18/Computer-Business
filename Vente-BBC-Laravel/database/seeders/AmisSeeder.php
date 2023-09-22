<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $succursale = [
            [
                'succursale1' => 1,
                'succursale2' => 2,
            ],
            [
                'succursale1' => 1,
                'succursale2' => 3,
            ],
            [
                'succursale1' => 1,
                'succursale2' => 4,
            ]
        ];
        \App\Models\Amis::insert($succursale);
    }
}
