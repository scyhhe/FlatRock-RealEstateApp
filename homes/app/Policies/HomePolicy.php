<?php

namespace App\Policies;

use App\User;
use App\Home;
use Illuminate\Auth\Access\HandlesAuthorization;

class HomePolicy
{
    use HandlesAuthorization;

    public function before($user)
    {   
        return $user->isBroker();
    }
    /**
     * Determine whether the user can view the home.
     *
     * @param  \App\User  $user
     * @param  \App\Home  $home
     * @return mixed
     */
    public function view(User $user, Home $home)
    {
        return true;
    }

    /**
     * Determine whether the user can create homes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isBroker()) {
            return true;
        } 
        return false;
    }

    /**
     * Determine whether the user can update the home.
     *
     * @param  \App\User  $user
     * @param  \App\Home  $home
     * @return mixed
     */
    public function update(User $user, Home $home)
    {
        if (! $user->isBroker()) { return false;}
        return $user->id === $home->user_id;
    }

    /**
     * Determine whether the user can delete the home.
     *
     * @param  \App\User  $user
     * @param  \App\Home  $home
     * @return mixed
     */
    public function delete(User $user, Home $home)
    {
        if (! $user->isBroker()) { return false;}
        return $user->id === $home->user_id;
    }
}
