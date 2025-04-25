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
        Schema::create('medicaments', function (Blueprint $table) {
            $table->id();
            $table->string('nom_medicament');
            $table->string('description');
            $table->string('prix');
            $table->string('quantite');
            $table->string('image')->nullable();
            $table->string('statut')->default('disponible');
            $table->string('categorie');
            $table->string('marque');
            $table->string('dosage');
            $table->string('effets_secondaires')->nullable();
            $table->string('contre_indications')->nullable();
            $table->string('interactions')->nullable();
            $table->string('precautions')->nullable();
            $table->string('posologie')->nullable();
            $table->string('conservation')->nullable();
            $table->string('date_expiration')->nullable();
            $table->string('date_ajout')->nullable();
            $table->string('date_modification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicaments');
    }
};
