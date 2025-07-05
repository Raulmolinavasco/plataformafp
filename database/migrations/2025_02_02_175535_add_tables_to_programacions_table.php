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
        Schema::create('programacions', function (Blueprint $table) {
            $table->longText('objetivo base')->nullable();
            $table->longText('legislacion')->nullable();
            $table->longText('competencias profesionales')->nullable();
            $table->longText('objetivos generales')->nullable();
            $table->longText('metodologia')->nullable();
            $table->longText('materiales')->nullable();
            $table->longText('ra asociados')->nullable();
            $table->longText('seguridad')->nullable();
            $table->longText('sostenibilida')->nullable();
            $table->longText('tic')->nullable();
            $table->longText('procedimiento evaluacion')->nullable();
            $table->longText('calificacion')->nullable();
            $table->longText('evaluacion continua')->nullable();
            $table->longText('calificacion 1')->nullable();
            $table->longText('calificacion 2')->nullable();
            $table->longText('rec evaluacion continua')->nullable();
            $table->longText('rec modulos pendientes')->nullable();
            $table->longText('rec modulos parciales')->nullable();
            $table->longText('reclamaciones')->nullable();
            $table->longText('extraescolares')->nullable();
            $table->longText('diversidad')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programacions', function (Blueprint $table) {
            //
        });
    }
};
