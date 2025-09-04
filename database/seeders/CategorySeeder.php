<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::insert([
            ['name' => 'Eksterior'],
            ['name' => 'Interior'],
            ['name' => 'Kayu & Besi'],
            ['name' => 'Premium'],
        ]);
    }
}
