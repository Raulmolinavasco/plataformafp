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
        Schema::create('cicloformativos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')
                ->unique();
            $table->longText('descripcion')
                ->nullable();
            $table->foreignId('tipociclo_id')
                ->nulable()
                ->constrained('tipociclos')
                ->CascadeOndelete();
            $table->foreignId('departamento_id')
                ->nulable()
                ->constrained('departamentos')
                ->CascadeOndelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cicloformativos');
    }
};
