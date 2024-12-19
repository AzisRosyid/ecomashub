<?php

namespace Database\Seeders;

use App\Models\Waste;
use Illuminate\Database\Seeder;

class WasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Waste::truncate();

        Waste::factory()->createMany([
            [
                'product_id' => 1,
                'name' => 'Leftover Packaging',
                'type_id' => 1,
                'weight' => 0.5,
                'unit' => 'Kilogram',
                'description' => 'Reusable packaging waste.',
            ],
        ]);
    }
}
