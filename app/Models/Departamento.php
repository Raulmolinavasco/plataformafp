<?php

namespace App\Models;

use App\Models\Cicloformativo;
use App\Models\Instituto;
use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Departamento extends Model
{
    Use HasFactory;
    protected $fillable = [
        'nombre','descripcion','instituto_id','jefedepartamento_id'
    ];

    public function Instituto(): BelongsTo
    {
        return $this->belongsTo(Instituto::class);
    }

    public function Cicloformativo():HasMany {
        return $this->hasMany(Cicloformativo::class);
    }

   //aceder a profesores para despues poder acceder a usuarios
    public function Profesores_user():HasMany {
        return $this->hasMany(Profesor::class);
    }

    public function profesores(){
        return $this->belongsToMany(Profesor::class,'profesor_departamentos')->withTimestamps();
    }




}
