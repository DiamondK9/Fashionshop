<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
	
    use Notifiable;
    protected $primaryKey = 'admin_id';
    public $fillable = ['admin_name', 'admin_username', 'admin_password', 'admin_email', 'active'];
    public $hidden = ['password'];

}
