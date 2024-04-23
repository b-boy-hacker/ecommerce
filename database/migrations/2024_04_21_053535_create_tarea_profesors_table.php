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
        Schema::create('tarea_profesors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumnoID')->nullable();
            $table->foreign('alumnoID')->references('id')->on('curso_alumnos')
            ->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('materia');
            $table->string('Tema');
            $table->string('Imagen');
            $table->string('FechaEntrega');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarea_profesors');
    }
};
