<?php

use App\Models\Modulo;
use App\Models\Profesor;
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
        Schema::create('profesor_modulos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Modulo::class);
            $table->foreignIdFor(Profesor::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_modulos');
    }
};
