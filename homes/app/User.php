<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function isBroker(){
        return $this->user_role === 'broker';
    }

    public function hasRole($role)
    {
        return $this->user_role === $role;    
    }

    public function homes()
    {
        return $this->hasMany(Home::class);   
    }

    public function watchlist()
    {
        return $this->belongsToMany(Home::class);    
    }

    public function checkWatchlist($id)
    {
        return count($this->watchlist()->where('id', $id)->get());
    }
}
