<?php

namespace Database\Seeders;

use App\Models\CompanySocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanySocialMedia::create([
            'facebook' => 'https://www.facebook.com/CegahNarkobaBNN',
            'twitter' => 'https://twitter.com/BNNCegahNarkoba',
            'instagram' => 'https://www.instagram.com/bnn_cegahnarkoba/',
            'youtube' => 'https://www.youtube.com/channel/UCyxHvNT0h1Txc4HMS5HMWuA',
            'tiktok' => '',
            'threads' => '',
            'whatsapp' => 'https://wa.me/625280800064',
            'company_id' => 1,
        ]);
    }
}
