<?php

namespace Database\Factories;

use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransaksiKeluar>
 */
class TransaksiKeluarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tanggalKeluar = fake()->dateTimeBetween('2020-01-01', '2022-12-31');

        $tanggalExpired = clone $tanggalKeluar;
        $tanggalExpired->add(new DateInterval('P3M'));

        return [
            'tanggal_keluar' => $tanggalKeluar,
            'tanggal_expired' => $tanggalExpired,
            'barang_id' => fake()->numberBetween(1, 10),
            'jumlah' => fake()->randomNumber(2),
        ];
    }
}
