<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        User::factory()->createMany([
            [
                'first_name' => 'Azis',
                'last_name' => 'Rosyid',
                'username' => 'azisrosyid',
                'email' => 'azisrosyid@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'source_type' => 'Internal',
                'gender' => 'Laki-Laki',
                'date_of_birth' => '2004-05-28',
                'phone_number' => '0895421891378',
                'address' => 'Indonesia',
                'status' => 'Aktif'
            ],
            [
                'first_name' => 'Alif',
                'last_name' => 'Akbar',
                'username' => 'alifakbar',
                'email' => 'alifakbar@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'source_type' => 'Internal',
                'gender' => 'Laki-Laki',
                'date_of_birth' => '2024-1-1',
                'phone_number' => '123412342134',
                'address' => 'Indonesia',
                'status' => 'Aktif'
            ],
        ]);
    }
}
