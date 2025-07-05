<?php

use App\Http\Controllers\InformeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/admin');
});
Route::get('/instituto-docx', [InformeController::class, 'instituto'])->name('informeinstituto');
Route::get('/programacion/{record}', [InformeController::class, 'programacion'])->name('Informe.programacion');
