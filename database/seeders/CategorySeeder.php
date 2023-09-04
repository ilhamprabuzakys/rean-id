<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Artikel',
            'slug' => 'artikel',
            'category_type_id' => 5,
        ]);
        Category::create([
            'name' => 'Foto',
            'slug' => 'foto',
            'category_type_id' => 4,
        ]);
        Category::create([
            'name' => 'Video',
            'slug' => 'video',
            'category_type_id' => 3,
        ]);
        Category::create([
            'name' => 'Poster',
            'slug' => 'poster',
            'category_type_id' => 4,
        ]);
        Category::create([
            'name' => 'Desain',
            'slug' => 'desain',
            'category_type_id' => 4,
        ]);
        Category::create([
            'name' => 'Musik',
            'slug' => 'musik',
            'category_type_id' => 2,
        ]);
        Category::create([
            'name' => 'Podcast',
            'slug' => 'podcast',
            'category_type_id' => 1,
        ]);
    }
}
