<?php

use App\Models\Commande;
use App\Models\ProduitSuccrusale;
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
            $table->foreignIdFor(ProduitSuccrusale::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Commande::class)->constrained()->cascadeOnDelete();
            $table->float("prix_vente");
            $table->integer("reduction")->nullable();
            $table->integer("qte_commande");
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
