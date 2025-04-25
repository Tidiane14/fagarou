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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_medicament');
           // $table->unsignedBigInteger('id_fournisseur');
            $table->string('quantite');
            $table->string('date_ajout');
            $table->string('date_modification')->nullable();
            $table->string('statut')->default('disponible');
            $table->foreign('id_medicament')->references('id')->on('medicaments')->onDelete('cascade');
            //$table->foreign('id_fournisseur')->references('id')->on('fournisseurs')->onDelete('cascade');
           // $table->string('fournisseur')->nullable();
            //$table->string('date_expiration')->nullable();
            //$table->string('prix_achat')->nullable();
            //$table->string('prix_vente')->nullable();
            //$table->string('date_ajout')->nullable();
            //$table->string('date_modification')->nullable();
            //$table->string('statut')->default('disponible');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
