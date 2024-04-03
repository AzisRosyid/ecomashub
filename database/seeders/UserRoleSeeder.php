<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRole::truncate();

        UserRole::factory()->createMany([
            [
                'organization_id' => 1,
                'name' => 'Founder',
                'type' => 'Pengurus',
            ],
        ]);
    }
}
