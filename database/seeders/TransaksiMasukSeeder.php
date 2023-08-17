<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransaksiMasukSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    \App\Models\TransaksiMasuk::factory()->count(1200)->create();
  }
}