<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = ['customer_name', 'password', 'customer_email', 'customer_phone', 'customer_address', 'active'];
}
