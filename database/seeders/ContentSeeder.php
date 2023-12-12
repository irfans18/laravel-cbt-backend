<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::factory()->create([
            'title' => 'About Us',
        ]);
        Content::factory()->create([
            'title' => 'Tips and Tricks',
        ]);
        Content::factory()->create([
            'title' => 'Terms and Conditions',
        ]);
        Content::factory()->create([
            'title' => 'Privacy Policy',
        ]);
        Content::factory()->create([
            'title' => 'Help',
        ]);
    }
}
