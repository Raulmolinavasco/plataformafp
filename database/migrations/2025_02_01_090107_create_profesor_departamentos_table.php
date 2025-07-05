<?php

use App\Models\Departamento;
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
        Schema::create('profesor_departamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Departamento::class);
            $table->foreignIdFor(Profesor::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_departamentos');
    }
};
