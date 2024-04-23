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
        Schema::create('materia_profesors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profesor_id')->nullable();
            $table->unsignedBigInteger('materia_id')->nullable();
            $table->foreign('profesor_id')->references('id')->on('profesors')
            ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('materia_id')->references('id')->on('materias')
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_profesors');
    }
};
