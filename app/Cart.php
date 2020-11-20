<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function products()
    {
        return $this->belongsTo('App\Product');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
