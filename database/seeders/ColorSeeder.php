<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        Color::insert([
            ['id' => 1, 'name' => 'Merah'],
            ['id' => 2, 'name' => 'Biru'],
            ['id' => 3, 'name' => 'Hijau'],
            ['id' => 4, 'name' => 'Putih'],
            ['id' => 5, 'name' => 'Hitam'],
            ['id' => 6, 'name' => 'Abu-abu'],
            ['id' => 7, 'name' => 'Kuning'],
        ]);
    }
}
