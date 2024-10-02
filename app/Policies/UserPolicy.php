<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any users.
     */
    public function viewAny(User $user)
    {
        return $user->role === 'admin'; // Doar adminii pot vizualiza lista de utilizatori
    }

    /**
     * Determine whether the user can view the user.
     */
    public function view(User $user, User $model)
    {
        return $user->role === 'admin' || $user->id === $model->id; // Adminii pot vizualiza orice utilizator, utilizatorii pot vizualiza propriul cont
    }

    /**
     * Determine whether the user can create users.
     */
    public function create(User $user)
    {
        return $user->role === 'admin'; // Doar adminii pot crea utilizatori
    }

    /**
     * Determine whether the user can update the user.
     */
    public function update(User $user, User $model)
    {
        return $user->role === 'admin' || $user->id === $model->id; // Adminii pot actualiza orice utilizator, utilizatorii pot actualiza propriul cont
    }

    /**
     * Determine whether the user can delete the user.
     */
    public function delete(User $user, User $model)
    {
        return $user->role === 'admin'; // Doar adminii pot șterge utilizatori
    }
}
