<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::truncate();

        Order::factory()->createMany([
            [
                'store_id' => 1,
                'name' => 'Custom Order 1',
                'down_payment' => 50000,
                'description' => 'Custom request for client',
                'date_start' => now(),
                'date_end' => now()->addDays(7),
                'status' => 'Pengajuan',
            ],
        ]);

        foreach (range(1, 10) as $index) {
            Order::create([
                'store_id' => fake()->randomDigitNotNull(), // Replace with real store IDs if needed
                'name' => fake()->company(),
                'down_payment' => fake()->randomFloat(2, 100, 1000),
                'description' => fake()->paragraph(),
                'date_start' => now()->subDays(rand(1, 30)),
                'date_end' => now()->addDays(rand(1, 30)),
                'status' => fake()->randomElement(['Pengajuan', 'Proses', 'Selesai']),
            ]);
        }
    }
}
