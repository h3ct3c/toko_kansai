<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Color::insert([
            ['name' => 'Neutral'], //1
            ['name' => 'Red'], //2
            ['name' => 'Orange'],//3
            ['name' => 'Yellow'],//4
            ['name' => 'Green'],//5
            ['name' => 'Blue'],//6
            ['name' => 'Purple'],//7
        ]);
    }
}
