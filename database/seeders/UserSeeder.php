<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(5)->create();
        DB::table('users')->insert([
            [
                'name' => 'Andy',
                'email' => 'waw@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'rw' => 1,
                'rt' => 0,
            ],
            [
                'name' => 'Deiga',
                'email' => 'wiw@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'rt' => 1,
                'rw' => 0,
            ],
            [
                'name' => 'arya',
                'email' => 'wuw@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'rt' => 2,
                'rw' => 0,
            ],

            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
