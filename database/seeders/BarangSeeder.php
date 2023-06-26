<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Barang::factory()->count(50)->create();
        \App\Models\Barang::factory()->createMany([
            [
                'nama' => 'Milku 200ML',
                'id_jenis_barang' => 2,
                'id_satuan_barang' => 1,
            ],
            [
                'nama' => 'Golda 200ML',
                'id_jenis_barang' => 2,
                'id_satuan_barang' => 1,
            ],
            [
                'nama' => 'The Rio 180ML',
                'id_jenis_barang' => 2,
                'id_satuan_barang' => 1,
            ],
            [
                'nama' => 'Floridina 350ML',
                'id_jenis_barang' => 2,
                'id_satuan_barang' => 1,
            ],
            [
                'nama' => 'Le Minerale 600ML',
                'id_jenis_barang' => 2,
                'id_satuan_barang' => 1,
            ],
            [
                'nama' => 'Mie Sedap Kari 72',
                'id_jenis_barang' => 1,
                'id_satuan_barang' => 1,
            ],
            [
                'nama' => 'Japota Ayam 68Gr',
                'id_jenis_barang' => 1,
                'id_satuan_barang' => 1,
            ],
            [
                'nama' => 'Potabee BBQ 35Gr',
                'id_jenis_barang' => 1,
                'id_satuan_barang' => 1,
            ],
            [
                'nama' => 'Chitato Beef 35Gr',
                'id_jenis_barang' => 1,
                'id_satuan_barang' => 1,
            ],
            [
                'nama' => 'Chiki Twist 15Gr',
                'id_jenis_barang' => 1,
                'id_satuan_barang' => 1,
            ],
        ]);
    }
}
