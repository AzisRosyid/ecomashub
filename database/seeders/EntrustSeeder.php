<?php

namespace Database\Seeders;

use App\Models\Entrust;
use Illuminate\Database\Seeder;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entrust::truncate();

        Entrust::factory()->createMany([
            [
                'product_id' => 1,
                'user_id' => 2,
                'admin_id' => 1,
                'quantity' => 10,
                'price' => 150000,
                'description' => 'Sample entrust transaction',
                'date' => now(),
            ],
        ]);
    }
}
