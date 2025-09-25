<?php

// app/Models/CartItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'product_id', 'quantity','subtotal'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

