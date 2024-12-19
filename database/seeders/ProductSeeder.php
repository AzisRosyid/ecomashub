<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();

        Product::factory()->createMany([
            [
                'store_id' => 2,
                'name' => 'T-Shirt',
                'category_id' => 2,
                'weight' => 0.3,
                'unit' => 'Kilogram',
                'stock' => 50,
                'price' => 50000,
            ],
            [
                'store_id' => 2,
                'name' => 'Jeans',
                'category_id' => 3,
                'weight' => 0.6,
                'unit' => 'Kilogram',
                'stock' => 30,
                'price' => 75000,
            ],
            [
                'store_id' => 2,
                'name' => 'Jacket',
                'category_id' => 2,
                'weight' => 1.2,
                'unit' => 'Kilogram',
                'stock' => 20,
                'price' => 150000,
            ],
            [
                'store_id' => 2,
                'name' => 'Shoes',
                'category_id' => 3,
                'weight' => 0.8,
                'unit' => 'Kilogram',
                'stock' => 25,
                'price' => 120000,
            ],
            [
                'store_id' => 2,
                'name' => 'Sweater',
                'category_id' => 2,
                'weight' => 0.7,
                'unit' => 'Kilogram',
                'stock' => 15,
                'price' => 100000,
            ],
            [
                'store_id' => 2,
                'name' => 'Cap',
                'category_id' => 1,
                'weight' => 0.1,
                'unit' => 'Kilogram',
                'stock' => 100,
                'price' => 25000,
            ],
            [
                'store_id' => 2,
                'name' => 'Sunglasses',
                'category_id' => 1,
                'weight' => 0.2,
                'unit' => 'Kilogram',
                'stock' => 60,
                'price' => 45000,
            ],
            [
                'store_id' => 2,
                'name' => 'Backpack',
                'category_id' => 3,
                'weight' => 1.0,
                'unit' => 'Kilogram',
                'stock' => 40,
                'price' => 85000,
            ],
            [
                'store_id' => 2,
                'name' => 'Wallet',
                'category_id' => 1,
                'weight' => 0.3,
                'unit' => 'Kilogram',
                'stock' => 80,
                'price' => 35000,
            ],
            [
                'store_id' => 2,
                'name' => 'Belt',
                'category_id' => 1,
                'weight' => 0.2,
                'unit' => 'Kilogram',
                'stock' => 75,
                'price' => 20000,
            ],

            // Category 1: Electronics
            [
                'store_id' => 1,
                'name' => 'Laptop',
                'category_id' => 1,
                'weight' => 2.5,
                'unit' => 'Kilogram',
                'stock' => 10,
                'price' => 10000000,
            ],
            [
                'store_id' => 1,
                'name' => 'Smartphone',
                'category_id' => 1,
                'weight' => 0.5,
                'unit' => 'Kilogram',
                'stock' => 40,
                'price' => 8000000,
            ],
            [
                'store_id' => 1,
                'name' => 'Headphones',
                'category_id' => 1,
                'weight' => 0.3,
                'unit' => 'Kilogram',
                'stock' => 60,
                'price' => 1500000,
            ],
            [
                'store_id' => 1,
                'name' => 'Smartwatch',
                'category_id' => 1,
                'weight' => 0.4,
                'unit' => 'Kilogram',
                'stock' => 25,
                'price' => 3000000,
            ],
            [
                'store_id' => 1,
                'name' => 'Tablet',
                'category_id' => 1,
                'weight' => 0.7,
                'unit' => 'Kilogram',
                'stock' => 30,
                'price' => 5000000,
            ],
            [
                'store_id' => 1,
                'name' => 'Desktop PC',
                'category_id' => 1,
                'weight' => 8.0,
                'unit' => 'Kilogram',
                'stock' => 15,
                'price' => 12000000,
            ],
            [
                'store_id' => 1,
                'name' => 'Printer',
                'category_id' => 1,
                'weight' => 3.0,
                'unit' => 'Kilogram',
                'stock' => 20,
                'price' => 2000000,
            ],
            [
                'store_id' => 1,
                'name' => 'External Hard Drive',
                'category_id' => 1,
                'weight' => 0.4,
                'unit' => 'Kilogram',
                'stock' => 50,
                'price' => 1200000,
            ],
            [
                'store_id' => 1,
                'name' => 'Camera',
                'category_id' => 1,
                'weight' => 1.2,
                'unit' => 'Kilogram',
                'stock' => 18,
                'price' => 5000000,
            ],
            [
                'store_id' => 1,
                'name' => 'Bluetooth Speaker',
                'category_id' => 1,
                'weight' => 0.6,
                'unit' => 'Kilogram',
                'stock' => 45,
                'price' => 1500000,
            ],
        ]);
    }
}
