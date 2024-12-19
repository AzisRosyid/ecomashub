<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Media::truncate();

        Media::factory()->createMany([
            [
                'type' => 'File',
                'provider' => 'Google Drive',
                'content' => 'file1.pdf',
            ],
            [
                'type' => 'Gambar',
                'provider' => 'One Drive',
                'content' => 'image1.jpg',
            ],
        ]);
    }
}
