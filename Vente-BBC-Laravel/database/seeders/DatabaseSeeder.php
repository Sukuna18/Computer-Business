<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            SuccursaleSeeder::class,
            ProduitSeeder::class,
            SuccursaleProduitSeeder::class,
            CaracteristiqueSeeder::class,
            ProduitCaracteristiqueSeeder::class,
            AmisSeeder::class,
        ]);
        \App\Models\User::factory(5)->create();
    }
}
