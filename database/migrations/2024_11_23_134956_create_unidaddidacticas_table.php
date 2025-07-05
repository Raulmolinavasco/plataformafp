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
        Schema::create('unidaddidacticas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->longText('descripcion');
            $table->foreignId('modulo_id')
                ->nulable()
                ->constrained('modulos')
                ->CascadeOndelete();
            $table->foreignId('resultadodeaprendizaje_id')
                ->nulable()
                ->constrained('resultadodeaprendizaje')
                ->CascadeOndelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidaddidacticas');
    }
};
