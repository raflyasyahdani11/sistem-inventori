<?php

namespace Database\Factories;

use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransaksiMasuk>
 */
class TransaksiMasukFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      $tanggalMasuk = fake()->dateTimeBetween('2020-01-01', '2023-12-31');

      $tanggalExpired = clone $tanggalMasuk;
      $tanggalExpired->add(new DateInterval('P3M'));

      $jumlah = fake()->numberBetween(10, 31);

      return [
         'tanggal_masuk' => $tanggalMasuk,
         'tanggal_expired' => $tanggalExpired,
         'barang_id' => fake()->numberBetween(1, 10),
         'jumlah' => $jumlah,
         'jumlah_sekarang' => $jumlah,
      ];
   }
}
