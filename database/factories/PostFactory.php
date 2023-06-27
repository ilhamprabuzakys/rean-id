<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        $slug = Str::slug($title);
        $paragraphs = fake()->paragraphs(10);
        $body = implode('<br>', $paragraphs);

        return [
            'title' => $title,
            'slug' => $slug,
            'body' => $body,
            'category_id' => \random_int(1, 7),
            'user_id' => \random_int(1, 20),
        ];
    }
}
