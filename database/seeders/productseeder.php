<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'KANSAI PEARLSHEEN',
                'description' => '',
                'price' => 295.000,
                'stock' => 500,
                'category_id' => 2, // sesuaikan dengan id di tabel categories
                'color_id' => 1,    // sesuaikan dengan id di tabel colors
                'image_url' => 'img/pearlsheen.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KANSAI DIAMOND SHIELD',
                'description' => '',
                'price' => 402.000,
                'stock' => 500,
                'category_id' => 2,
                'color_id' => 2,
                'image_url' => 'img/ftalit.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KANSAI SPLESH GLIMMER',
                'description' => '',
                'price' => 350.000,
                'stock' => 500,
                'category_id' => 3,
                'color_id' => 3,
                'image_url' => 'img/diamondshield.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KANSAI ANTIMOSQUITO',
                'description' => 'Cat interior dengan perlindungan anti nyamuk.',
                'price' => 220.000,
                'stock' => 500,
                'category_id' => 1,
                'color_id' => 4,
                'image_url' => 'img/antimosquito.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KANSAI TROPIC',
                'description' => 'Cat pelindung kayu dengan warna natural.',
                'price' => 125.000,
                'stock' => 500,
                'category_id' => 2,
                'color_id' => 5,
                'image_url' => 'img/tropic.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KANSAI PROPERTY INTERIOR',
                'description' => 'Cat interior dengan hasil yang mewah',
                'price' => 145.000,
                'stock' => 500,
                'category_id' => 2,
                'color_id' => 3,
                'image_url' => 'img/propertyint.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KANSAI PROPERTY EKSTERIOR',
                'description' => 'Cat eksterior dengan hasil yang mewah',
                'price' => 225.000,
                'stock' => 500,
                'category_id' => 2,
                'color_id' => 5,
                'image_url' => 'img/propertyeks.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KANSAI SPLESH',
                'description' => 'Cat eksterior dengan hasil akhir yang mengkilap',
                'price' => 280.000,
                'stock' => 500,
                'category_id' => 2,
                'color_id' => 5,
                'image_url' => 'img/splesh.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KANSAI RAIN BLOCK',
                'description' => 'Cat eksterior anti bocor.',
                'price' => 240.000,
                'stock' => 500,
                'category_id' => 2,
                'color_id' => 5,
                'image_url' => 'img/rainblock.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KANSAI FTALIT',
                'description' => 'Cat pelindung kayu dengan warna natural.',
                'price' => 95.000,
                'stock' => 500,
                'category_id' => 2,
                'color_id' => 5,
                'image_url' => 'img/ftalit.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KANSAI FTALIT DUO',
                'description' => 'Cat pelindung kayu dengan warna natural.',
                'price' => 110.000,
                'stock' => 500,
                'category_id' => 2,
                'color_id' => 5,
                'image_url' => 'img/ftalitduo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
