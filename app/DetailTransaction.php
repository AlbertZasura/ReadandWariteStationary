<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    public function products()
    {
        return $this->belongsTo('App\Product');
    }

    public function transactions()
    {
        return $this->belongsTo('App\Transaction');
    }
}
