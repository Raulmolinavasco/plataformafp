<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class unidad_resultado extends Model
{
    public $fillable = [
        'programacion_id','unidaddidactica_id','ra1','ra2','ra3','ra4','ra5','ra6','ra7','ra8','ra9','ra10',
    ];
    public function Programacion(): BelongsTo
    {
        return $this->belongsTo(Programacion::class);
    }


}
