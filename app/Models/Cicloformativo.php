<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cicloformativo extends Model
{
    Use HasFactory;
    protected $fillable = [
        'nombre','descripcion','tipociclo_id','departamento_id','duracion','codigo'
    ];

    public function Departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }

    public function Cursos():HasMany {
        return $this->hasMany(Curso::class);
    }
    public function Cicloformativos():HasMany {
        return $this->hasMany(Cicloformativo::class);
    }
    public function Tipociclo(): BelongsTo
    {
        return $this->belongsTo(Tipociclo::class);
    }
    public function Modulos():HasMany {
        return $this->hasMany(Modulo::class);
    }

}
