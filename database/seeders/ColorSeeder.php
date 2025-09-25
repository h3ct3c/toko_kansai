<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $colors = [
            ['id' => 1, 'name' => 'Netral'],
            ['id' => 2, 'name' => 'Merah'],
            ['id' => 3, 'name' => 'Oranye'],
            ['id' => 4, 'name' => 'Kuning'],
            ['id' => 5, 'name' => 'Hijau'],
            ['id' => 6, 'name' => 'Biru'],
            ['id' => 7, 'name' => 'Ungu'],
        ];

        foreach ($colors as $color) {
            Color::updateOrCreate(
                ['id' => $color['id']],   // cari berdasarkan ID
                ['name' => $color['name']] // update kalau ada, insert kalau belum ada
            );
        }
    }
}
