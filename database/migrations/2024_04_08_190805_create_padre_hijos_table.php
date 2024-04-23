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
        Schema::create('padre_hijos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('padre_id')->nullable();
            $table->unsignedBigInteger('hijo_id')->nullable();
            $table->foreign('padre_id')->references('id')->on('padres');
            $table->foreign('hijo_id')->references('id')->on('alumnos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('padre_hijos');
    }
};
