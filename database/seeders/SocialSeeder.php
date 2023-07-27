<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Social::create([
            'name' => 'Instagram',
            'slug' => 'instagram',
        ]);
        Social::create([
            'name' => 'Tiktok',
            'slug' => 'tiktok',
        ]);
        Social::create([
            'name' => 'Whatsapp',
            'slug' => 'whatsapp',
        ]);
        Social::create([
            'name' => 'Facebook',
            'slug' => 'facebook',
        ]);
        Social::create([
            'name' => 'Twitter',
            'slug' => 'twitter',
        ]);
        Social::create([
            'name' => 'Threads',
            'slug' => 'threads',
        ]);
        Social::create([
            'name' => 'Pinterest',
            'slug' => 'pinterest',
        ]);
    }
}
