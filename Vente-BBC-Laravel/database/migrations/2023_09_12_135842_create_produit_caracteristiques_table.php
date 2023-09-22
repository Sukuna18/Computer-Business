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
        Schema::create('produit_caracteristiques', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Produit::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Caracteristique::class)->constrained()->cascadeOnDelete();
            $table->string('valeur');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_caracteristiques');
    }
};
