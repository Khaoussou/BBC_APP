<?php

use App\Models\Caracteristique;
use App\Models\Produit;
use App\Models\Unite;
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
        Schema::create('caract_produits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Produit::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Caracteristique::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Unite::class)->constrained()->cascadeOnDelete();
            $table->string("description");
            $table->string("valeur");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caract_produits');
    }
};
