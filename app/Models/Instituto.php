<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instituto extends Model
{
    Use HasFactory;

    protected $fillable = [
        'nombre','direccion','ciudad','provincia','codigopostal','telefono','codigocentro',
    ];

    public function Departamento():HasMany {
        return $this->hasMany(Departamento::class);
        }
}
