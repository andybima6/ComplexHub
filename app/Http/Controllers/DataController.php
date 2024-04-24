<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DataController extends Controller
{
    public function rtPage()
        {
            $user = auth()->user();

            $breadcrumb = (object)[
                'title' => 'Data RT',
            ];
            return view('rt', ['breadcrumb' => $breadcrumb]);
        }
        public function kkPage()
        {
            $user = auth()->user();

            $breadcrumb = (object)[
                'title' => 'Data Kartu Keluarga',
            ];
            return view('kk', ['breadcrumb' => $breadcrumb]);
        }
        public function wargaPage()
        {
            $user = auth()->user();

            $breadcrumb = (object)[
                'title' => 'Data Warga',
            ];
            return view('warga', ['breadcrumb' => $breadcrumb]);
        }

        public function saranPage()
        {
            $user = auth()->user();

            $breadcrumb = (object)[
                'title' => 'Saran dan Pengaduan',
            ];
            return view('saran', ['breadcrumb' => $breadcrumb]);
        }
}