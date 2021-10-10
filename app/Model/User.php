<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
}

public function user_address()
{
    return $this->hasOne('App\Model\UserAddress', 'user_id', 'id');
}