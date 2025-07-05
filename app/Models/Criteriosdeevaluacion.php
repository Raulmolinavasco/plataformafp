<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Criteriosdeevaluacion extends Model
{
    Use HasFactory;
    protected $fillable = [
        'nombre','descripcion','resultadoaprendizaje_id','profesor_id'
    ];
    public function Resultadoaprendizaje(): BelongsTo
    {
        return $this->belongsTo(Resultadoaprendizaje::class);
    }

}
