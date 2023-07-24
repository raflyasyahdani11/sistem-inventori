<?php

namespace Database\Seeders;

use App\Models\TransaksiMasuk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SatuanBarangSeeder::class,
            JenisBarangSeeder::class,
            SupplierSeeder::class,
            BarangSeeder::class,

            TransaksiKeluarSeeder::class,
            TransaksiMasukSeeder::class,

            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
