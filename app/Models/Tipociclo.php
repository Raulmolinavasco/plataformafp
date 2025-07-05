<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipociclo extends Model
{
    Use HasFactory;
    protected $fillable = [
        'nombre','descripcion'
    ];
    public function Cicloformativo():HasMany {
        return $this->hasMany(Cicloformativo::class);
    }
}
