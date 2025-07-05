<?php

namespace App\Models;

use App\Models\Cicloformativo;
use App\Models\Modulo;
use App\Models\Profesor;
use App\Models\Resultadoaprendizaje;
use App\Models\Unidaddidactica;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Programacion extends Model
{
    Use HasFactory;
    protected $fillable = [
    'modulo_id','descripcion','user_id','objetivo base','legislacion','competencias profesionales','objetivos generales','criterios de evaluacion','resultados de aprendizaje','unidaddidacticas','metodologia','materiales','ra asociados','seguridad','sos','tic','procedimiento evaluacion','calificacion 0','evaluacion continua','calificacion 1','calificacion 2', 'rec evaluacion continua','rec primera evaluacion','rec parcial','reclamacion','extraescolares','medidas'
    ];

    public function resultadoaprendizajes():HasMany {
        return $this->hasMany(Resultadoaprendizaje::class);
    }

    public function unidaddidacticas():HasMany {
        return $this->hasMany(Unidaddidactica::class);
    }
    public function unidad_resultados():HasMany {
        return $this->hasMany(unidad_resultado::class);
    }

    public function Modulo(): BelongsTo
    {
        return $this->belongsTo(Modulo::class);
    }

    public function Cicloformativo(): BelongsTo
    {
        return $this->belongsTo(Cicloformativo::class);
    }

    public function Profesor(): BelongsTo
    {
        return $this->belongsTo(Profesor::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
