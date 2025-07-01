<?php

namespace App\Policies;

use App\Models\TransaksiKeuangan;
use App\Models\User;

class TransaksiKeuanganPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TransaksiKeuangan $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->can('view-transaction')) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TransaksiKeuangan $model): bool
    {
        if ($user->can('view-transaction')) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TransaksiKeuangan $model): bool
    {
        if ($user->can('view-transaction')) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TransaksiKeuangan $model): bool
    {
        if ($user->can('view-transaction')) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TransaksiKeuangan $model): bool
    {
        if ($user->can('view-transaction')) {
            return false;
        } else {
            return true;
        }
    }
}
