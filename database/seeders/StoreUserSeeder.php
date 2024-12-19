<?php

namespace Database\Seeders;

use App\Models\StoreUser;
use Illuminate\Database\Seeder;

class StoreUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StoreUser::truncate();

        StoreUser::factory()->createMany([
            [
                'store_id' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}