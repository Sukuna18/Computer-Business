<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('succursale_produits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Succursale::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Produit::class)->constrained()->cascadeOnDelete();
            $table->integer('prix_produit');
            $table->integer('prix_gros');
            $table->integer('quantite');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('succursale_produits');
    }
};
