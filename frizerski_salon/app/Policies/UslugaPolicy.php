<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Usluga;
use Illuminate\Auth\Access\HandlesAuthorization;

class UslugaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the usluga can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the usluga can view the model.
     */
    public function view(User $user, Usluga $model): bool
    {
        return true;
    }

    /**
     * Determine whether the usluga can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the usluga can update the model.
     */
    public function update(User $user, Usluga $model): bool
    {
        return true;
    }

    /**
     * Determine whether the usluga can delete the model.
     */
    public function delete(User $user, Usluga $model): bool
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
     * Determine whether the usluga can restore the model.
     */
    public function restore(User $user, Usluga $model): bool
    {
        return false;
    }

    /**
     * Determine whether the usluga can permanently delete the model.
     */
    public function forceDelete(User $user, Usluga $model): bool
    {
        return false;
    }
}
