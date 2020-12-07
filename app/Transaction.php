<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id','date'];

    /*
    Eloquent Relationship fungsinya untuk mempermudah dalam membuat relasi
    antar table
    */ 
    public function detailTransactions()
    {
        return $this->hasMany('App\DetailTransaction');
    }

    /*
    Eloquent Relationship fungsinya untuk mempermudah dalam membuat relasi
    antar table
    */ 
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
