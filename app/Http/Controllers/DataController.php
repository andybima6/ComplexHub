<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DataController extends Controller
{
    public function rtPage()
        {
            $user = auth()->user();

            $breadcrumb = (object)[
                'title' => 'Pendataan',
                'subtitle' => 'Data RT',
            ];
            return view('rt', ['breadcrumb' => $breadcrumb]);
        }
        public function kkPage()
        {
            $user = auth()->user();

            $breadcrumb = (object)[
                'title' => 'Pendataan',
                'subtitle' => 'Data Kartu Keluarga',
            ];
            return view('kk', ['breadcrumb' => $breadcrumb]);
        }
        public function wargaPage()
        {
            $user = auth()->user();

            $breadcrumb = (object)[
                'title' => 'Pendataan',
                'subtitle' => 'Data Warga',
            ];
            return view('warga', ['breadcrumb' => $breadcrumb]);
        }

        public function saranPage()
        {
            $user = auth()->user();

            $breadcrumb = (object)[
                'title' => 'Saran dan Pengaduan',
                'subtitle' => 'Saran dan Pengaduan',
            ];
            return view('saran', ['breadcrumb' => $breadcrumb]);
        }

        public function detailsaranPage()
        {
            $user = auth()->user();

            $breadcrumb = (object)[
                'title' => 'Saran dan Pengaduan',
                'subtitle' => 'Detail Saran dan Pengaduan',
            ];
            return view('detailSaran', ['breadcrumb' => $breadcrumb]);
        }

        public function tanggapanPage()
{
    // Mendapatkan user yang sedang login
    $user = auth()->user();

    // Membuat objek breadcrumb
    $breadcrumb = (object) [
        'title' => 'Saran dan Pengaduan',
        'subtitle' => 'Tanggapan',
    ];

    return view('tanggapan', ['breadcrumb' => $breadcrumb]);
        
}




}