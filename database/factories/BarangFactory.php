<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $locale = 'id_ID';

        $faker = \Faker\Factory::create($locale);
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        static $number = 1;

        return [
            'kode' => 'B' . str_pad($number++, 5, '0', STR_PAD_LEFT),
            'nama' => $faker->foodName(),
            'jumlah' => fake()->numberBetween(60, 90),
            'harga' => fake()->randomNumber(4, true),
            'id_jenis_barang' => fake()->numberBetween(1, 2),
            'id_satuan_barang' => 1,
            'id_supplier' => fake()->numberBetween(1, 10),
        ];
    }
}
