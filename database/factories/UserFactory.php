<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $locale = 'id_ID';

        return [
            'name' => fake($locale)->unique()->name(),
            'username' => fake()->unique()->userName(),
            'no_hp' => fake($locale)->unique()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => '$2y$10$KOJ0RVL7hc3kGo99BJhttuhyD81zzS8PaW0ZrMDZAouvAurZPdv0S', // 123456
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
