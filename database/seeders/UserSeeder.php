<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Diso Al',
            'username' => 'diso',
            'no_hp' => '08213128412',
        ]);

        \App\Models\User::factory()->count(10)->create();
    }
}
