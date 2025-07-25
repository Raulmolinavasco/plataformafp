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
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->longText('descripcion');
            $table->string('codigo')->nullable();
            $table->string('nombre')->unique();
            $table->string('curso_id')->unique();
            $table->integer('horas')->nullable();
            $table->integer('horas_semanales')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modulos');
    }
};
