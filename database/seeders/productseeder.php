<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'KANSAI FTALIT',
                'image' => 'ftalit.png',
                'description' => 'Cat Besi & Kayu dengan formula khusus yang melindungi permukaan dari karat.',
                'price' => 140000,
                'stock' => 500,
                'category' => 3, // Kayu & Besi
                'color' => 1,
            ],
            [
                'name' => 'KANSAI FTALIT DUO',
                'image' => 'ftalitduo.png',
                'description' => 'Cat Besi & Kayu dengan perlindungan ekstra.',
                'price' => 150000,
                'stock' => 500,
                'category' => 3,
                'color' => 1,
            ],
            [
                'name' => 'KANSAI ANTIMOSQUITO',
                'image' => 'antimosquito.png',
                'description' => 'Cat anti nyamuk dengan formula khusus.',
                'price' => 120000,
                'stock' => 500,
                'category' => 2,
                'color' => 6,
            ],
            [
                'name' => 'KANSAI PROPERTY INTERIOR',
                'image' => 'propertyint.png',
                'description' => 'Cat interior hasil akhir halus dan tahan lama.',
                'price' => 180000,
                'stock' => 500,
                'category' => 2,
                'color' => 4,
            ],
            [
                'name' => 'KANSAI TROPIC',
                'image' => 'tropic.png',
                'description' => 'Cat interior ramah lingkungan dengan aroma rendah.',
                'price' => 130000,
                'stock' => 500,
                'category' => 2,
                'color' => 3,
            ],
            [
                'name' => 'KANSAI PEARL SHEEN',
                'image' => 'pearlsheen.png',
                'description' => 'Cat interior mengkilap dan tahan lama.',
                'price' => 200000,
                'stock' => 500,
                'category' => 2,
                'color'=> 7,
            ],
            [
                'name' => 'KANSAI SPLESH GLIMMER',
                'image' => 'splesh_glimmer.png',
                'description' => 'Cat interior dengan efek kilau elegan.',
                'price' => 220000,
                'stock' => 500,
                'category' => 2,
                'color'=> 5,
            ],
            [
                'name' => 'KANSAI RAIN BLOCK',
                'image' => 'rain_block.png',
                'description' => 'Cat eksterior tahan air, melindungi dari rembesan hujan.',
                'price' => 250000,
                'stock' => 500,
                'category' => 1,
                'color'=> 2,
            ],
            [
                'name' => 'KANSAI PROPERTY EKSTERIOR',
                'image' => 'propertyeksterior.png',
                'description' => 'Cat eksterior dengan perlindungan ekstra.',
                'price' => 170000,
                'stock' => 500,
                'category' => 1,
                'color'=> 5,
            ],
            [
                'name' => 'KANSAI SPLESH WEATHER PROOF',
                'image' => 'splesh_weather_proof.png',
                'description' => 'Cat eksterior tahan cuaca ekstrem.',
                'price' => 300000,
                'stock' => 500,
                'category' => 1,
                'color'=> 4,
            ],
            [
                'name' => 'KANSAI DIAMOND SHIELD',
                'image' => 'diamondshield.png',
                'description' => 'Cat eksterior tahan lama & mengkilap.',
                'price' => 350000,
                'stock' => 500,
                'category' => 1,
                'color'=> 6,
            ],
        ]);
    }
}
