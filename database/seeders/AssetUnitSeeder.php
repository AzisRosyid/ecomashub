<?php

namespace Database\Seeders;

use App\Models\AssetUnit;
use Illuminate\Database\Seeder;

class AssetUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssetUnit::truncate();

        AssetUnit::factory()->createMany([
            ['name' => 'Kilogram'],
            ['name' => 'Gram'],
            ['name' => 'Meter'],
        ]);
    }
}
