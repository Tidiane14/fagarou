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
        Schema::create('commande', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_user')->constrained('utilisateur')->onDelete('cascade');
            $table->foreignId('id_paiement')->constrained('paiement')->onDelete('cascade');
            $table->foreignId('id_pharmacie')->constrained('pharmacie')->onDelete('cascade');
            $table->integer('quantite')->default(1);
            $table->date('date_commande');
            $table->string('statut')->default('en attente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande');
    }
};
