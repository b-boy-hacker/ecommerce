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
        Schema::create('curso_alumnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('profesor_id');
            $table->foreign('curso_id')->references('id')->on('cursos')
            ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('alumno_id')->references('id')->on('alumnos')
            ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('profesor_id')->references('id')->on('profesors')
            ->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_alumnos');
    }
};
