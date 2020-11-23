<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','type_id','stock','price','description','image'];

    public function productTypes()
    {
        return $this->belongsTo(ProductType::class, 'type_id');
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
