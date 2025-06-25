<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Termin;
use Illuminate\Auth\Access\HandlesAuthorization;

class TerminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the termin can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the termin can view the model.
     */
    public function view(User $user, Termin $model): bool
    {
        return true;
    }

    /**
     * Determine whether the termin can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the termin can update the model.
     */
    public function update(User $user, Termin $model): bool
    {
        return true;
    }

    /**
     * Determine whether the termin can delete the model.
     */
    public function delete(User $user, Termin $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the termin can restore the model.
     */
    public function restore(User $user, Termin $model): bool
    {
        return false;
    }

    /**
     * Determine whether the termin can permanently delete the model.
     */
    public function forceDelete(User $user, Termin $model): bool
    {
        return false;
    }
}
