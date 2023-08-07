<?php

namespace Database\Factories;

use App\Models\User;
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
        $title = Str::of(fake()->sentence())->title();
        $slug = Str::slug($title);
        $paragraphs = fake()->paragraphs(10);
        $body = implode('<br>', $paragraphs);

        return [
            'title' => $title,
            'slug' => $slug,
            'body' => $body,
            'date' => date('Y-m-d'),
            'category_id' => \random_int(1, 6),
            'user_id' => \random_int(1, User::count()),
            'status' => fake()->randomElement(['approved', 'rejected']),
        ];
    }
}
