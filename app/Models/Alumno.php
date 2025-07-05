<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Alumno extends Model
{
    Use HasFactory;
    protected $fillable = [
        'user_id','curso_id',
    ];

    public function Curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }
    public function Modulos():HasMany {
        return $this->hasMany(Modulo::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }


}
