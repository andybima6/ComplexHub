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
            'nama_warga' => 'lukman',
            'nama_usaha' => 'Menara Cafe',
            'deskripsi' => 'tempat nongkrong yang seru dan asik bisa buat nugas bareng juga',
            'foto_produk' => 'foto-produk/wHiNCDGnnWZGJ11xUm70xXwhDIhlxvCZrUUg36js.png',
            'status_rt' => 'pending',
            'status_rw' => 'pending',
        ]);
        Umkm::create([
            'nama_warga' => 'lukman',
            'nama_usaha' => 'RS Cafe',
            'deskripsi' => 'solusi tempat nongkrong yang murah dan 24 jam, kamu bisa ngobrol santai dan melakukan hal seru lainnya bareng temen kamu!',
            'foto_produk' => 'foto-produk/R4KsDSVEtK0Gke7IDZfLDIIMNb2MEn1q73qdseow.png',
            'status_rt' => 'pending',
            'status_rw' => 'pending',
        ]);
        Umkm::create([
            'nama_warga' => 'lukman',
            'nama_usaha' => 'Warnet',
            'deskripsi' => 'tempat mabar seru dan murah',
            'foto_produk' => 'foto-produk/W9ONIIptXFbqasrvBYdXyJpWXvTlNauut6SBr6EW.png',
            'status_rt' => 'pending',
            'status_rw' => 'pending',
        ]);
        Umkm::create([
            'nama_warga' => 'lukman',
            'nama_usaha' => 'Pangea Castle',
            'deskripsi' => 'bengkel motor custom impian para lelaki',
            'foto_produk' => 'foto-produk/179cAiEckQzyZBFKiTL1LB9OZhaQ3d78DCIzVnT7.png',
            'status_rt' => 'pending',
            'status_rw' => 'pending',
        ]);
    }
}
