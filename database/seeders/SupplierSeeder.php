<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Supplier::factory()->create([
            'nama' => 'PT.Riau Abdi Sentosa',
            'alamat' => 'Jl.Riau Ujung No.89, Pekanbaru',
        ]);
        \App\Models\Supplier::factory()->count(4)->create();
    }
}
