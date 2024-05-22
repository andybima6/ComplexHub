<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\suggestion;
use App\Models\Umkm;

class DataController extends Controller
{
    public function rtPage()
        {
            $user = auth()->user();
            $suggestions = suggestion::all();
            $izinUsaha = Umkm::all();
            $activities = Activity::all();

            $breadcrumb = (object)[
                'title' => 'Pendataan',
                'subtitle' => 'Data RT',
            ];
            return view('RT.dashboardRT', compact('suggestions', 'izinUsaha', 'activities'), ['breadcrumb' => $breadcrumb]);
        }

        public function rwPage()
        {
            $user = auth()->user();
            $suggestions = suggestion::all();
            $izinUsaha = Umkm::all();
            $activities = Activity::all();

            $breadcrumb = (object)[
                'title' => 'Pendataan',
                'subtitle' => 'Data RW',
            ];
            return view('RW.dashboardRW', compact('suggestions', 'izinUsaha', 'activities'), ['breadcrumb' => $breadcrumb]);
        }
        public function pdPage()
        {
            $user = auth()->user();

            $breadcrumb = (object)[
                'title' => 'Pendataan',
                'subtitle' => 'Data Kartu Keluarga',
            ];
            return view('Penduduk.dashboardPD', ['breadcrumb' => $breadcrumb]);
        }
        public function kkPage()
        {
            $user = auth()->user();

            $breadcrumb = (object)[
                'title' => 'Pendataan',
                'subtitle' => 'Data Kartu Keluarga',
            ];
            return view('data', ['breadcrumb' => $breadcrumb]);
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
