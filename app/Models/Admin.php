<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
	
    use Notifiable;
    protected $guard = 'admin';
    // identify $guard for admin to work backward with auth.php
    //notifiable trait for notifaction.

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'id'; 
    // primarykey for fixed the lookup key

    
    public $fillable = ['name', 'username', 'password', 'email', 'active'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public $hidden = ['password'/*, 'remember_token'*/];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

}
