<?php

namespace Database\Seeders;

use App\Models\Umkm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Umkm::create([
            'nama_warga' => 'aku',
            'nama_usaha' => 'Menara Cafe',
            'deskripsi' => 'tempat nongkrong yang seru dan asik bisa buat nugas bareng juga',
            'foto_produk' => 'public/img/wHiNCDGnnWZGJ11xUm70xXwhDIhlxvCZrUUg36js.png',
            'status_rt' => 'izin belum disetujui oleh ketua RT',
            'status_rw' => 'izin belum disetujui oleh ketua RW',
        ]);
        Umkm::create([
            'nama_warga' => 'aku',
            'nama_usaha' => 'RS Cafe',
            'deskripsi' => 'solusi tempat nongkrong yang murah dan 24 jam, kamu bisa ngobrol santai dan melakukan hal seru lainnya bareng temen kamu!',
            'foto_produk' => 'public/img/JrCl3bbhFI8pqaF2wfWCnqz0sRTD41WpMjWQNmzv.png',
            'status_rt' => 'izin belum disetujui oleh ketua RT',
            'status_rw' => 'izin belum disetujui oleh ketua RW',

        ]);
        Umkm::create([
            'nama_warga' => 'aku',
            'nama_usaha' => 'Pangea Castle',
            'deskripsi' => 'bengkel motor custom impian para lelaki',
            'foto_produk' => 'public/img/cYv9vA34KmXV3EWOgJHe51em9tbJr7f45X0c55O6.png',
            'status_rt' => 'izin belum disetujui oleh ketua RT',
            'status_rw' => 'izin belum disetujui oleh ketua RW',
        ]);
    }
}
