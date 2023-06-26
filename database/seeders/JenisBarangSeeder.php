<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\JenisBarang::factory()->createMany([
            ['nama' => 'Makanan'],
            ['nama' => 'Minuman'],
        ]);
    }
}
