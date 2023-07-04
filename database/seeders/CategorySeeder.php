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
        ]);
        Category::create([
            'name' => 'Foto',
            'slug' => 'foto',
        ]);
        Category::create([
            'name' => 'Video',
            'slug' => 'video',
        ]);
        Category::create([
            'name' => 'Poster',
            'slug' => 'poster',
        ]);
        Category::create([
            'name' => 'Desain',
            'slug' => 'desain',
        ]);
        Category::create([
            'name' => 'Musik',
            'slug' => 'musik',
        ]);
        Category::create([
            'name' => 'Audio',
            'slug' => 'audio',
        ]);
        Category::create([
            'name' => 'Ebook',
            'slug' => 'ebook',
        ]);
        Category::create([
            'name' => 'Event',
            'slug' => 'event',
        ]);
    }
}
