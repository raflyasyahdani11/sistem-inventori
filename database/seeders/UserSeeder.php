<?php

namespace Database\Seeders;

use App\Permission\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()
            ->create([
                'name' => 'Diso Al',
                'username' => 'diso',
                'no_hp' => '08213128412',
            ])
            ->assignRole(Role::SUPER_ADMIN);

        \App\Models\User::factory()
            ->create([
                'name' => 'Pemilik Toko',
                'username' => 'pemilik.toko',
            ])
            ->each(function ($user) {
                $user->assignRole(Role::PEMILIK_TOKO);
            });

        \App\Models\User::factory()
            ->count(4)
            ->create()
            ->each(function ($user) {
                $user->assignRole(Role::KARYAWAN);
            });
    }
}
