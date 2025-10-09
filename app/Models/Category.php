<?php

namespace App\Models;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id'); //satu kategori memiliki banyak produk
    }
}
