<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url',
        'price',
        'stock',
        'category_id',
        'color_id',
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke warna
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    // Relasi ke cart items
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
