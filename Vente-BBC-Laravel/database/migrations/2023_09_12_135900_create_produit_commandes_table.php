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
        Schema::create('produit_commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Produit::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Commande::class)->constrained()->cascadeOnDelete();
            $table->integer('quantite');
            $table->integer('prix_vente');
            $table->integer('reduction')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_commandes');
    }
};
