<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modulo extends Model
{
    Use HasFactory;
    protected $fillable = [
        'nombre','descripcion','curso_id','horas','horas_semanales','codigo'
    ];
    public function profesors(){
        return $this->belongsToMany(Profesor::class,'profesor_modulos')->withTimestamps();
    }
    public function Unidadesdidacticas():HasMany {
        return $this->hasMany(Unidaddidactica::class);
    }
   /* public function Profesor(): BelongsTo
    {
        return $this->belongsTo(Profesor::class);
    }
        */

    public function Curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }

    public function Alumno(): BelongsTo
    {
        return $this->belongsTo(Alumno::class);
    }

    public function Resultadodeaprendizaje():HasMany {
        return $this->hasMany(Resultadoaprendizaje::class);
    }

    public function Programacion():HasMany {
        return $this->hasMany(Programacion::class);
    }

}
