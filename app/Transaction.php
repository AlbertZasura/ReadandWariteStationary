<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id','date'];

    public function detailTransactions()
    {
        return $this->hasMany('App\DetailTransaction');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
