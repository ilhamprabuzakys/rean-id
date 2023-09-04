<?php

namespace Database\Seeders;

use App\Models\CategoryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryType::create([
            'type' => 'Link'
        ]);
        CategoryType::create([
            'type' => 'Audio'
        ]);
        CategoryType::create([
            'type' => 'Video'
        ]);
        CategoryType::create([
            'type' => 'Image'
        ]);
        CategoryType::create([
            'type' => 'Text'
        ]);
    }
}
