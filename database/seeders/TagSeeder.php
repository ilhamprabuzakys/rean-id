<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'name' => '2023'
        ]);
        Tag::create([
            'name' => '2022'
        ]);
        Tag::create([
            'name' => '2021'
        ]);
        Tag::create([
            'name' => '2020'
        ]);
    }
}
