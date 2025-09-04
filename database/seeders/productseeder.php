<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::insert([
            [
            'name' => 'KANSAI FTALIT',
            'image' => '',
            'description' => 'Cat Besi & Kayu dengan formula khusus yang dapat melindungi permukaan besi dan kayu dari karat dan kerusakan lainnya',
            'price' => 140000.00,
            'stock' => 500,
            'category' => 3, // Kayu dan Besi
            'color' => 1,// Neutral
            ],
            [
                'name' => 'KANSAI FTALIT DUO',
                'image' => '',
                'description' => 'Cat Besi & Kayu dengan formula khusu yang memberikan perlindungan ekstra pada permukaan besi dan kayu',
                'price' => 150000.00,
                'stock' => 500,
                'category' => 3, // Kayu & Besi
                'color' => 1, // Neutral
            ],
            [
                'name' => 'KANSAI ANTIMOSQUITO',
                'image' => '',
                'description' => 'Cat anti nyamuk dengan formula khusus yang melindungi rumah Anda dari serangan nyamuk',
                'price' => 120000.00,
                'stock' => 500,
                'category' => 2, // Interior
                'color' => 6, // Blue
            ],
            [
                'name' => 'KANSAI PROPERTY INTERIOR',
                'image' => '',
                'description' => 'Cat Interior dengan formula khusu yang memberikan hasil akhir yang halus dan tahan lama',
                'price' => 180000.00,
                'stock' => 500,
                'category' => 2, // Interior
                'color' => 4, // Kuning
            ],
            [
                'name' => 'KANSAI TROPIC',
                'image' => '',
                'description' => 'Cat interior yang aman dan ramah lingkungan dengan aroma rendah.',
                'price' => 130000.00,
                'stock' => 500,
                'category' => 2, // Interior
                'color' => 3, // Orange
            ],
            [
                'name' => 'KANSAI PEARL SHEEN',
                'image' => '',
                'description' => 'Cat interior dengan hasil akhir mengkilap dan tahan lama',
                'price' => 200000.00,
                'stock' => '500',
                'category' => 2, // Interior
                'color'=> 7, // Purple
            ],
            [
                'name' => 'KANSAI SPLESH GLIMMER',
                'image' => '',
                'description' => 'Cat Interior dengan efek kilau yang elegan dan tahan lama',
                'price' => 220000.00,
                'stock' => 500,
                'category' => 2, //Interior
                'color'=> 5, // Green
            ],
            [
                'name' => 'KANSAI RAIN BLOCK',
                'image' => '',
                'descriptiom' => 'Cat Eksterior dengan teknologi tahan air yang melindungi dinding dari rembesan air hujan',
                'price' => '250000.00',
                'stock' => 500,
                'category' => 1, //Ekterior
                'color'=> 2, // Red
            ],
            [
                'name' => 'KANSAI PROPERTY EKSTERIOR',
                'image' => '',
                'description' => 'Cat Eksterior dengan formula khusu yang memeberikan perlindungan ekstra pada dinding di luar ruangan rumah',
                'price' => 170000.00,
                'stock' => 500,
                'category' => 1, // Eksterior
                'color'=> 5, // Green
            ],
            [
                'name' => 'KANSAI SPLESH WEATHER PROOF',
                'image' => '',
                'description' => 'Cat Eksterior dengan teknologi tahan cuaca yang melindungi dinding dari perubahan cuaca ekstrem',
                'price' => 300000.00,
                'stock' => 500,
                'category' => 1, // Eksterior
                'color'=> 4, // Yellow
            ],
            [
                'name' => 'KANSAI DIAMOND SHIELD',
                'image' => '',
                'description' => 'Cat Ekterior dengan hasil akhir mengkilap dan tahan lama dari segala cuaca',
                'price' => 350000.00,
                'stock' => 500,
                'category' => 1, // Eksterior
                'color'=> 6, // Blue
            ],

        ]);
    }
}
