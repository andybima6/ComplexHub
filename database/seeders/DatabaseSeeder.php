<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
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

        User::factory(5)->create();
        $this->call([
            ActivitySeeder::class
        ]);

    }
}
