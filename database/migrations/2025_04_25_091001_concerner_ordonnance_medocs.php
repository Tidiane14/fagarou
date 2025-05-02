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
        if (!Schema::hasTable('concerner_ordonnance_medocs')) {
            Schema::create('concerner_ordonnance_medocs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_user');
                $table->string('date_creation');
                $table->string('imageUrl')->nullable();
                $table->unsignedBigInteger('id_medoc');
                $table->foreign('id_medoc')->references('id')->on('medicaments')->onDelete('cascade');
                $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
