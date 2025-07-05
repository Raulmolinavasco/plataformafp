<?php

namespace App\Models;

use App\Models\Modulo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resultadoaprendizaje extends Model
{
    Use HasFactory;
    protected $fillable = [
        'nombre','descripcion','modulo_id'
    ];
    public function Criteriosdeevaluacions():HasMany {
        return $this->hasMany(Criteriosdeevaluacion::class);
    }
    public function Modulo(): BelongsTo
    {
        return $this->belongsTo(Modulo::class);
    }
    public function Programacion(): BelongsTo
    {
        return $this->belongsTo(Programacion::class);
    }
    public function unidaddidacticas(){
        return $this->belongsToMany(Unidaddidactica::class,'unidad_reultados')->withTimestamps();
    }
}
