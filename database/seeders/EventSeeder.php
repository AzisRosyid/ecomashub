<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::truncate();

        Event::factory()->createMany([
            [
                'organization_id' => 1,
                'title' => 'Annual Meeting',
                'organizer' => 'PT. Ecomashub',
                'type' => 'Luring',
                'theme' => 1,
                'date_start' => now()->addDays(10),
                'date_end' => now()->addDays(11),
            ],
            [
                'organization_id' => 2,
                'title' => 'Community Gathering',
                'organizer' => 'KWT Jasmine Nologaten',
                'type' => 'Daring',
                'theme' => 2,
                'date_start' => now()->addDays(20),
                'date_end' => now()->addDays(21),
            ],
        ]);
    }
}
