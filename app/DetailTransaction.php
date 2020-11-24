<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $fillable = ['transaction_id', 'product_id', 'qty'];
    
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function transactions()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}