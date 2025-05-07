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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_commande');
            $table->unsignedBigInteger('id_livreur');
            $table->foreign('id_livreur')->references('id')->on('livreurs')->onDelete('cascade');
            $table->string('adresse_livraison');
            $table->string('date_livraison');
            $table->string('statut_livraison')->default('en attente');
            $table->string('frais_livraison')->nullable();
            $table->foreign('id_commande')->references('id')->on('commandes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
