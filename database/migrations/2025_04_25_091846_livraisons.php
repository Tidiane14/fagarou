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
            $table->foreignId('id_commande')->constrained()->onDelete('cascade');
            $table->string('adresse_livraison');
            $table->string('telephone_livraison');
            $table->string('statut');
            $table->dateTime('date_livraison');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    
    }
};
