<?php

namespace Database\Seeders;

use App\Permission\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Permission\Role as PermissionRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => PermissionRole::SUPER_ADMIN]);
        $pemilikToko = Role::create(['name' => PermissionRole::PEMILIK_TOKO]);
        $karyawan = Role::create(['name' => PermissionRole::KARYAWAN]);

        $pemilikToko->givePermissionTo(Permission::LIHAT_DASHBOARD);
        $pemilikToko->givePermissionTo(Permission::KELOLA_DATA_PENGGUNA);
        $pemilikToko->givePermissionTo(Permission::KELOLA_DATA_BARANG);
        $pemilikToko->givePermissionTo(Permission::KELOLA_DATA_SUPPLIER);
        $pemilikToko->givePermissionTo(Permission::KELOLA_DATA_TRANSAKSI_MASUK);
        $pemilikToko->givePermissionTo(Permission::KELOLA_DATA_TRANSAKSI_KELUAR);
        $pemilikToko->givePermissionTo(Permission::LIHAT_LAPORAN_TRANSAKSI);
        $pemilikToko->givePermissionTo(Permission::LIHAT_LAPORAN_PERHITUNGAN);

        $karyawan->givePermissionTo(Permission::KELOLA_DATA_BARANG);
        $karyawan->givePermissionTo(Permission::KELOLA_DATA_SUPPLIER);
        $karyawan->givePermissionTo(Permission::KELOLA_DATA_TRANSAKSI_MASUK);
        $karyawan->givePermissionTo(Permission::KELOLA_DATA_TRANSAKSI_KELUAR);
        $karyawan->givePermissionTo(Permission::LIHAT_LAPORAN_PERHITUNGAN);
    }
}
