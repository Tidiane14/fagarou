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
        Schema::create('pharmacie', function (Blueprint $table) {
            $table->id_pharmaice();
            $table->string('nom');
            $table->string('adresse');
            $table->string('ville');
            $table->string('email')->unique();
            $table->string('telephone')->nullable();     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacie');
    }
};
