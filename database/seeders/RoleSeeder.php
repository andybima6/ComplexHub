<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role_name' => 'rt',
        ]);

        Role::create([
            'role_name' => 'rw',
        ]);
        Role::create([
            'role_name' => 'pd',
        ]);
    }
}
