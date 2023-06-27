<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $memberIncrement = 2;
        static $adminIncrement = 2;

        $name = '';
        $email = '';
        $username = '';
        $password = '';

        $role = fake()->randomElement(['admin', 'member']);

        if ($role == 'member') {
            $password = \bcrypt('member');
            $email = $memberIncrement . '.member@rean.id';
            $name = 'Member ' . $memberIncrement;
            $username = 'member' . $memberIncrement++;
        } elseif ($role == 'admin') {
            $password = \bcrypt('admin');
            $email = $adminIncrement . '.admin@rean.id';
            $name = 'Admin ' . $adminIncrement;
            $username = 'admin' . $adminIncrement++;
        }

        return [
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'role' => $role,
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
