<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Curso extends Model
{
    Use HasFactory;
    protected $fillable = [
        'curso','descripcion','cicloformativo_id','user_id','duracion',
     ];
    public function Modulo():HasMany {
        return $this->hasMany(Modulo::class);
    }
    /*public function Profesors():HasMany {
        return $this->hasMany(Profesor::class);
    }*/
    public function Alumno():HasMany {
        return $this->hasMany(Alumno::class);
    }


    public function Cicloformativo(): BelongsTo
    {
        return $this->belongsTo(Cicloformativo::class);
    }
    /*public function User()
    {
        return $this->hasOneThrough(User::class, Profesor::class);
    }*/
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }






}
