<?php

namespace Database\Seeders;

use App\Models\Collaboration;
use Illuminate\Database\Seeder;

class CollaborationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Collaboration::truncate();

        Collaboration::factory()->createMany([
            [
                'store_id' => 1,
                'name' => 'Partner 1',
                'type' => 'Mitra',
                'email' => 'partner1@example.com',
                'phone_number' => '081234567890',
                'address' => 'Partner Address 1',
                'image' => 1,
                'description' => 'Reliable partner for logistics.',
                'status' => 'Aktif',
            ],
        ]);
    }
}
