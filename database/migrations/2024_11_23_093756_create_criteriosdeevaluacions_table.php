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
        Schema::create('criteriosdeevaluacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->longText('descripcion');
            $table->foreignId('resultadoaprendizaje_id')
                ->nulable()
                ->constrained('resultadoaprendizajes')
                ->CascadeOndelete();
            $table->foreignId('profesor_id')
                ->nulable()
                ->constrained('profesors')
                ->CascadeOndelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criteriosdeevaluacions');
    }
};
