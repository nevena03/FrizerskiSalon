<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Racun;
use Illuminate\Auth\Access\HandlesAuthorization;

class RacunPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the racun can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the racun can view the model.
     */
    public function view(User $user, Racun $model): bool
    {
        return true;
    }

    /**
     * Determine whether the racun can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the racun can update the model.
     */
    public function update(User $user, Racun $model): bool
    {
        return true;
    }

    /**
     * Determine whether the racun can delete the model.
     */
    public function delete(User $user, Racun $model): bool
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
     * Determine whether the racun can restore the model.
     */
    public function restore(User $user, Racun $model): bool
    {
        return false;
    }

    /**
     * Determine whether the racun can permanently delete the model.
     */
    public function forceDelete(User $user, Racun $model): bool
    {
        return false;
    }
}
