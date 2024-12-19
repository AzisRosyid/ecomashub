<?php

namespace Database\Seeders;

use App\Models\WasteType;
use Illuminate\Database\Seeder;

class WasteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WasteType::truncate();

        WasteType::factory()->createMany([
            [
                'name' => 'Organic Waste',
                'category' => 'Organik',
            ],
        ]);
    }
}
