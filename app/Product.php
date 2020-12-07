<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','type_id','stock','price','description','image'];

    /*
    Eloquent Relationship fungsinya untuk mempermudah dalam membuat relasi
    antar table
    */ 
    public function productTypes()
    {
        return $this->belongsTo(ProductType::class, 'type_id');
    }

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
    public function detailTransactions()
    {
        return $this->hasMany('App\DetailTransaction');
    }
}
