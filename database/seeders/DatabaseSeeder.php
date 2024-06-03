<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,

            CriteriaSeeder::class,
            AlternativeSeeder::class,
            PenilaianSeeder::class,
            RtSeeder::class,
            ActivitySeeder::class,
            UmkmSeeder::class,
            DataKartuKeluargaSeeder::class,
            AnggotaKeluargaSeeder::class,
            SuggestionSeeder::class,
        ]);

        DB::table('tb_alternatif')->insert([
            [
                'id_alternatif' => 'A01',
                'nama_alternatif' => 'Kayutangan heritage',
            ],
            [
                'id_alternatif' => 'A02',
                'nama_alternatif' => 'Jatim Park',
            ],
            [
                'id_alternatif' => 'A03',
                'nama_alternatif' => 'Malang Skyland',
            ],
            [
                'id_alternatif' => 'A04',
                'nama_alternatif' => 'Batu Secret Zoo',
            ],
            [
                'id_alternatif' => 'A05',
                'nama_alternatif' => 'Bromo Tengger Semeru National Park',
            ],
            
        ]);
        DB::table('tb_kriteria')->insert([
            [
                'id_kriteria' => 'C01',
                'nama_kriteria' => 'biaya tiket masuk',
                'atribut' => 'cost',
                'bobot' => 0.5,
            ],
            [
                'id_kriteria' => 'C02',
                'nama_kriteria' => 'fasilitas',
                'atribut' => 'benefit',
                'bobot' => 0.3,
            ],
            [
                'id_kriteria' => 'C03',
                'nama_kriteria' => 'kebersihan',
                'atribut' => 'benefit',
                'bobot' => 0.8,
            ],
            [
                'id_kriteria' => 'C04',
                'nama_kriteria' => 'keamanan',
                'atribut' => 'benefit',
                'bobot' => 0.2,
            ],
            [
                'id_kriteria' => 'C05',
                'nama_kriteria' => 'biaya akomodasi',
                'atribut' => 'cost',
                'bobot' => 0.7,
            ], 
        ]);

        DB::statement("INSERT INTO tb_nilai SELECT null, id_alternatif, id_kriteria, ROUND(1 + RAND()*5), NULL, NULL FROM tb_alternatif, tb_kriteria");
    }
}
