<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Permission\Permission as PermissionConst;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => PermissionConst::LIHAT_DASHBOARD]);
        Permission::create(['name' => PermissionConst::KELOLA_DATA_PENGGUNA]);
        Permission::create(['name' => PermissionConst::KELOLA_DATA_BARANG]);
        Permission::create(['name' => PermissionConst::KELOLA_DATA_SUPPLIER]);
        Permission::create(['name' => PermissionConst::KELOLA_DATA_TRANSAKSI_KELUAR]);
        Permission::create(['name' => PermissionConst::KELOLA_DATA_TRANSAKSI_MASUK]);
        Permission::create(['name' => PermissionConst::LIHAT_LAPORAN_TRANSAKSI]);
        Permission::create(['name' => PermissionConst::LIHAT_LAPORAN_PERHITUNGAN]);
    }
}
