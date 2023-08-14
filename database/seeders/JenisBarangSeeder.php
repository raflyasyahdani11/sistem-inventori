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
            ['nama' => 'Makanan'],              // 1
            ['nama' => 'Minuman'],              // 2
            ['nama' => 'Sabun'],                // 3
            ['nama' => 'Pasta Gigi'],           // 4
            ['nama' => 'Detergen'],             // 5
            ['nama' => 'Pembersih Lantai'],     // 6
            ['nama' => 'Minyak Goreng'],        // 7
            ['nama' => 'Shampo'],               // 8    
        ]);
    }
}
