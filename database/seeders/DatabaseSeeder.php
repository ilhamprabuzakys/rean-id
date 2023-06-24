<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        ];

        try {
            foreach ($seeders as $seeder) {
                if (class_exists($seeder)) {
                    $this->call($seeder);
                }
            }
            \App\Models\Post::factory(100)->create();
            \App\Models\User::factory(10)->create();
        } catch (\Throwable $th) {
            dd($th, 'something went wrong');
        }
    }
}
