<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ["user_id", "product_id", "qty"];
    
    /*
    Eloquent Relationship fungsinya untuk mempermudah dalam membuat relasi
    antar table
    */ 
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /*
    Eloquent Relationship fungsinya untuk mempermudah dalam membuat relasi
    antar table
    */ 
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}