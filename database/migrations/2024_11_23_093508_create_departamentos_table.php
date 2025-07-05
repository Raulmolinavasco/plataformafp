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
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')
                ->unique();
            $table->longText('descripcion')
                ->nullable();
            $table->foreignId('instituto_id')
                ->nulable()
                ->constrained('institutos')
                ->CascadeOndelete();
            $table->foreignId('jefedepartamento_id')
                ->nulable()
                ->constrained('users')
                ->CascadeOndelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};
