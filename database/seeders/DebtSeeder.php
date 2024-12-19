<?php

namespace Database\Seeders;

use App\Models\Debt;
use Illuminate\Database\Seeder;

class DebtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Debt::truncate();

        Debt::factory()->createMany([
            [
                'store_id' => 1,
                'name' => 'Bank Loan',
                'value' => 10000000,
                'interest' => 5.0,
                'date_start' => now(),
                'date_end' => now()->addYear(),
                'description' => 'Loan for expanding inventory.',
                'is_updated' => false,
            ],
        ]);
    }
}
