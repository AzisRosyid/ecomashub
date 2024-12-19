<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Expense::truncate();

        Expense::factory()->createMany([
            [
                'store_id' => 1,
                'name' => 'Monthly Rent',
                'collaboration_id' => 1,
                'value' => 500000,
                'type' => 'Rutin',
                'date_start' => now(),
                'date_end' => null,
                'interval' => 30,
                'description' => 'Rent for store location.',
                'is_updated' => false,
            ],
        ]);
    }
}
