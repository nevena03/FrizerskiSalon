<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Obavestenja;
use Illuminate\Auth\Access\HandlesAuthorization;

class ObavestenjaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the obavestenja can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the obavestenja can view the model.
     */
    public function view(User $user, Obavestenja $model): bool
    {
        return true;
    }

    /**
     * Determine whether the obavestenja can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the obavestenja can update the model.
     */
    public function update(User $user, Obavestenja $model): bool
    {
        return true;
    }

    /**
     * Determine whether the obavestenja can delete the model.
     */
    public function delete(User $user, Obavestenja $model): bool
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
     * Determine whether the obavestenja can restore the model.
     */
    public function restore(User $user, Obavestenja $model): bool
    {
        return false;
    }

    /**
     * Determine whether the obavestenja can permanently delete the model.
     */
    public function forceDelete(User $user, Obavestenja $model): bool
    {
        return false;
    }
}
