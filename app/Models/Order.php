<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_name',
        'color',
        'quantity',
        'total_price',
        'status',
        'jalan',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'nomor_telepon',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
