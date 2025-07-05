<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profesor extends Model
{
    Use HasFactory;
    protected $fillable = [
        'departamento_id','user_id','nombre','email'
    ];
    public function modulos(){
        return $this->belongsToMany(Modulo::class,'profesor_modulos')->withTimestamps();
    }
  /*  public function Modulos():HasMany {
        return $this->hasMany(Modulo::class);
    }
        */
    public function departamentos(){
            return $this->belongsToMany(Departamento::class,'profesor_departamentos')->withTimestamps();
    }


    //acceder a profesores
    Public function profesores()
    {
        return $this->belongsTo(Profesor::class);
    }


   /* public function Departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }
        */
   /* public function Curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }*/
   /* public function user(){
        return $this->belongsToMany(User::class,'user_profesors')->withTimestamps();
    }
*/

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /*public function User():HasOne {
        return $this->hasOne(User::class);
    }*/

    public function Curso(): HasOne
    {
        return $this->hasOne(Curso::class);
    }


}
