<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::truncate();

        ProductCategory::factory()->createMany([
            ['name' => 'Electronics'],
            ['name' => 'Clothing'],
            ['name' => 'Books'],
        ]);
    }
}
