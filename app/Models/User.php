<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];
    
    /**
     * 设置密码加密
     * @param $password
     * @return string
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \Hash::make($password);
    }

}
