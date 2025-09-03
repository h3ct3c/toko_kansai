<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'customer_id',
        'product_id',
        'color_id',
        'total_price',
        'stok',
        'status',
    ];
    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity');
    }
    
}
