<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asset::truncate();

        Asset::factory()->createMany([
            [
                'store_id' => 1,
                'name' => 'Projector',
                'category' => 'Alat',
                'quantity' => 5,
                'unit_id' => 1,
                'location' => 'Meeting Room',
                'image' => 1,
                'description' => 'A high-definition projector.',
                'status' => 'Tersedia',
            ],
        ]);
    }
}
