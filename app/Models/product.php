<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'stock',
        'category_id',
        'color_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

     public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')->withPivot('quantity');
    
    }

} 
