<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CompanySocialMedia;
use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeders = [
            UserSeeder::class,
            PostSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            CompanySeeder::class,
            CompanySocialMediaSeeder::class,
            SocialSeeder::class
        ];

        try {
            foreach ($seeders as $seeder) {
                if (class_exists($seeder)) {
                    $this->call($seeder);
                }
            }
            \App\Models\Post::factory(200)->create();
            // \App\Models\User::factory(20)->create();
            // \App\Models\Tag::factory(50)->create();
        } catch (\Throwable $th) {
            dd($th, 'something went wrong');
        }
    }
}
