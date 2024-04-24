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
            'subtitle' => '',
        ];
        return view('RT.usulanKegiatanRT', ['breadcrumb' => $breadcrumb]);
    }
    public function indexRW()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
            'subtitle' => '',
        ];
        return view('RW.usulanKegiatanRW', ['breadcrumb' => $breadcrumb]);
    }
    public function indexPenduduk()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
            'subtitle' => '',
        ];
        return view('Penduduk.usulanKegiatanPD', ['breadcrumb' => $breadcrumb]);
    }

    public function indexDetailIzinRT() {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => '',
        ];

        return view('RT.detailKegiatanRT', ['breadcrumb' => $breadcrumb]);
    }
    public function indexDetailIzinRW() {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => '',
        ];

        return view('RW.detailKegiatanRW', ['breadcrumb' => $breadcrumb]);
    }
    public function indexDetailIzinPenduduk() {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => '',
        ];

        return view('Penduduk.detailKegiatanPD', ['breadcrumb' => $breadcrumb]);
    }
    public function indexTambahIzinPenduduk() {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => '',
        ];

        return view('Penduduk.tambahKegiatanPD', ['breadcrumb' => $breadcrumb]);
    }
}
