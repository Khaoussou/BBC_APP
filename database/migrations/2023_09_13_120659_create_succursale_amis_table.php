<?php

use App\Models\Succursale;
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
        Schema::create('succursale_amis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Succursale::class)->constrained()->cascadeOnDelete();
            $table->foreignId("ami_id")->constrained("succursales");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('succursale_amis');
    }
};
