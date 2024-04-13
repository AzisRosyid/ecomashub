<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::truncate();

        Store::factory()->createMany([
            [
                'user_id' => 1,
                'name' => 'Serba Ada',
                'email' => 'serbaada@gmail.com',
                'phone_number' => '0123434233',
                'address' => 'Indonesia',
                'status' => 'Aktif'
            ],
            [
                'user_id' => 1,
                'name' => 'Kebun Merdeka',
                'email' => 'kebunmerdeka@gmail.com',
                'phone_number' => '083429383228',
                'address' => 'Indonesia',
                'status' => 'Aktif'
            ],
        ]);
    }
}
