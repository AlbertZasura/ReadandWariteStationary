<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    Eloquent Relationship fungsinya untuk mempermudah dalam membuat relasi
    antar table
    */ 
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    /*
    Eloquent Relationship fungsinya untuk mempermudah dalam membuat relasi
    antar table
    */ 
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
