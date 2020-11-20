<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','type_id','stock','price','description','image'];

    public function productTypes()
    {
        return $this->belongsTo('App\ProductType');
    }

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    public function detailTransactions()
    {
        return $this->hasMany('App\DetailTransaction');
    }
}
