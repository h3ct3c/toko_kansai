<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['id' => 1, 'name' => 'Interior'],
            ['id' => 2, 'name' => 'Eksterior'],
            ['id' => 3, 'name' => 'Premium'],
            ['id' => 4, 'name' => 'Kayu & Besi'],
        ]);
    }
}
