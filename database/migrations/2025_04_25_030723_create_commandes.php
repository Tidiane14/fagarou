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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_pharmacie');
            $table->foreign('id_pharmacie')->references('id')->on('pharmacies')->onDelete('cascade');
            $table->unsignedBigInteger('id_paiement');
            $table->foreign('id_paiement')->references('id')->on('paiements')->onDelete('cascade');
            $table->string('statut')->default('en attente');
            $table->string('montant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
