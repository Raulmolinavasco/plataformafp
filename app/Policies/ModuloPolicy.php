<?php

namespace App\Policies;

use App\Models\Modulo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ModuloPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasRole(['Admin','Profesor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Modulo $modulo): bool
    {
        if ($user->hasRole(['Admin','Profesor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasRole(['Admin','Profesor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Modulo $modulo): bool
    {
        if ($user->hasRole(['Admin','Profesor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Modulo $modulo): bool
    {
        if ($user->hasRole(['Admin','Profesor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Modulo $modulo): bool
    {
        if ($user->hasRole(['Admin','Profesor'])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Modulo $modulo): bool
    {
        if ($user->hasRole(['Admin','Profesor'])) {
            return true;
        }

        return false;
    }
}
