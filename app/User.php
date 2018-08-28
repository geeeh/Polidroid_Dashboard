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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $rules = [
        'email' => 'bail|required|unique:posts|max:255',
        'password' => 'required|regex:/\A([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})\z/i',
        'name' => 'required|min:2|max:10'
    ];

}
