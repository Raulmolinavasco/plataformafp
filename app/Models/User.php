<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Profesor;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            //'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

    }
    public function profesores():HasMany {
        return $this->hasMany(Profesor::class);
    }
    /*public function Profesor(){
        return $this->belongsToMany(Profesor::class,'user_profesors')->withTimestamps();
    }
*/
    public function Curso():HasOne {
        return $this->hasOne(Curso::class);
    }
    public function Programacions():HasMany {
        return $this->hasMany(Programacion::class);
    }



    public function Alumnos():HasMany {
        return $this->hasMany(Alumno::class);
    }



    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole(['Admin', 'Director','Jefe de departamento','Jefe de estudios','Profesor']);
    }

}
