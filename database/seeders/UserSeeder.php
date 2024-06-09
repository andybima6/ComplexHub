<?php

namespace Database\Seeders;

use App\Models\RT;
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
        $rts = RT::all();
        if ($rts->isEmpty()) {
            // Handle the case where there are no RT records
            $this->command->info('No RT records found. Please seed the RT table first.');
            return;
        }
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
                'rt_id' => $rts->random()->id,
            ],
            [
                'name' => 'Brian Domani',
                'email' => 'brian@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'rt_id' => 1,
                'rw' => 0,
            ],
            [
                'name' => 'Jacob Satorius',
                'email' => 'jacob@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'rt_id' => 2,
                'rw' => 0,
            ],
            [
                'name' => 'Alice',
                'email' => 'alice@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'rt_id' => 3,
                'rw' => 0,
            ],
            [
                'name' => 'Bob',
                'email' => 'bob@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'rt_id' => 4,
                'rw' => 0,
            ],
            [
                'name' => 'Charlie',
                'email' => 'charlie@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'rt_id' => 5,
                'rw' => 0,
            ],
            [
                'name' => 'Diana',
                'email' => 'diana@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'rt_id' => 6,
                'rw' => 0,
            ],
            [
                'name' => 'Edward',
                'email' => 'edward@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'rt_id' => 7    ,
                'rw' => 0,
            ],
            [
                'name' => 'andy',
                'email' => 'andy@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'rt_id' => $rts->random()->id,
                'rw' => 0,
            ],
            // [
            //     'name' => 'aku',
            //     'email' => 'aku@gmail.com',
            //     'email_verified_at' => Carbon::now(),
            //     'password' => Hash::make('12345678'),
            //     'role_id' => 3,
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            //     'rt' => 0,
            //     'rw' => 0,
            // ],

            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
