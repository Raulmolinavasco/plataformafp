<?php

use App\Models\Programacion;
use App\Models\Resultadoaprendizaje;
use App\Models\Unidaddidactica;
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
        Schema::create('unidad_resultados', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Unidaddidactica::class);
            $table->foreignIdFor(Resultadoaprendizaje::class);
            $table->foreignIdFor(Programacion::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidad_resultados');
    }
};
