<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
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
            'nama' => fake($locale)->unique()->company(),
            'alamat' => fake($locale)->address(),
            'telepon' => fake($locale)->unique()->phoneNumber(),
            'biaya_kirim' => fake()->randomNumber(4),
            'lead_time' => fake()->numberBetween(3, 5),
        ];
    }
}
