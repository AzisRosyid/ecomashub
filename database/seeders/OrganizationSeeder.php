<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::truncate();

        Organization::factory()->createMany([
            [
                'name' => 'PT. Ecomashub',
                'is_master' => true,
                'status' => 'Aktif',
            ],
            [
                'name' => 'KWT Jasmine Nologaten',
                'status' => 'Aktif',
            ],
        ]);
    }
}
