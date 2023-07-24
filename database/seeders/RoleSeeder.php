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
        $petugasGudang = Role::create(['name' => PermissionRole::PETUGAS_GUDANG]);

        $pemilikToko->givePermissionTo(Permission::LIHAT_DASHBOARD);
        $pemilikToko->givePermissionTo(Permission::KELOLA_DATA_PENGGUNA);
        $pemilikToko->givePermissionTo(Permission::KELOLA_DATA_BARANG);
        $pemilikToko->givePermissionTo(Permission::KELOLA_DATA_SUPPLIER);
        $pemilikToko->givePermissionTo(Permission::KELOLA_DATA_TRANSAKSI_MASUK);
        $pemilikToko->givePermissionTo(Permission::KELOLA_DATA_TRANSAKSI_KELUAR);
        $pemilikToko->givePermissionTo(Permission::LIHAT_LAPORAN_TRANSAKSI);

        $petugasGudang->givePermissionTo(Permission::KELOLA_DATA_BARANG);
        $petugasGudang->givePermissionTo(Permission::KELOLA_DATA_SUPPLIER);
        $petugasGudang->givePermissionTo(Permission::KELOLA_DATA_TRANSAKSI_MASUK);
        $petugasGudang->givePermissionTo(Permission::KELOLA_DATA_TRANSAKSI_KELUAR);
    }
}
