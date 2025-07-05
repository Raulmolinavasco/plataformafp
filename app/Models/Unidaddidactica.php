<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidaddidactica extends Model
{
    Use HasFactory;
    protected $fillable = [
        'nombre','descripcion','modulo_id','programacion_id'
    ];
    public function Modulo(): BelongsTo
    {
        return $this->belongsTo(Modulo::class);
    }
    public function resultadoaprendizajes(){
        return $this->belongsToMany(Resultadoaprendizaje::class,'unidad_reultados')->withTimestamps();
    }

    public function Programacion(): BelongsTo
    {
        return $this->belongsTo(Programacion::class);
    }

}
