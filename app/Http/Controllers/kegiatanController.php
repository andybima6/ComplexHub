<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KegiatanController extends Controller
{
    public function indexRT()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
        ];
        return view('RT.usulanKegiatanRT', ['breadcrumb' => $breadcrumb]);
    }
    public function indexRW()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
        ];
        return view('RW.usulanKegiatanRW', ['breadcrumb' => $breadcrumb]);
    }
    public function indexPenduduk()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
        ];
        return view('Penduduk.usulanKegiatanPD', ['breadcrumb' => $breadcrumb]);
    }
}
