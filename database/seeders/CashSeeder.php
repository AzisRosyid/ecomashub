<?php

namespace Database\Seeders;

use App\Models\Cash;
use Illuminate\Database\Seeder;

class CashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cash::truncate();

        Cash::factory()->createMany([
            [
                'store_id' => 1,
                'name' => 'Daily Sales',
                'collaboration_id' => null,
                'value' => 200000,
                'type' => 'Sekali',
                'date_start' => now(),
                'date_end' => null,
                'interval' => null,
                'description' => 'Cash sales for the day.',
                'is_updated' => false,
            ],
        ]);
    }
}
