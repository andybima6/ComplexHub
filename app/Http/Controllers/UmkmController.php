<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function indexDataRT() {
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Data Usaha RT',
        ];

        return view('RT.dataUsahaRT', ['breadcrumb' => $breadcrumb]);
    }

    public function indexDataRW() {
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Data Usaha RW',
        ];

        return view('RW.dataUsahaRW', ['breadcrumb' => $breadcrumb]);
    }

    public function indexIzinRT() {
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Izin Usaha RT',
        ];

        return view('RT.izinUsahaRT', ['breadcrumb' => $breadcrumb]);
    }

    public function indexIzinRW() {
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Izin Usaha RW',
        ];

        return view('RW.izinUsahaRW', ['breadcrumb' => $breadcrumb]);
    }

    public function indexIzinPenduduk() {
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Izin Usaha Penduduk',
        ];

        return view('Penduduk.izinUsahaPenduduk', ['breadcrumb' => $breadcrumb]);
    }

    public function indexDataPenduduk() {
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Data Usaha Penduduk',
        ];

        return view('Penduduk.dataUsahaPenduduk', ['breadcrumb' => $breadcrumb]);
    }

    public function indexDetailIzinPenduduk() {
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Detail Izin Usaha Penduduk',
        ];

        return view('Penduduk.detailIzinUsaha', ['breadcrumb' => $breadcrumb]);
    }

    public function store(Request $request) {
        $request->validate([
            'namaLengkap' => 'required',
            'NIK' => 'required',
            'namaUsaha' => 'required',
            'deskripsiUsaha' => 'required',
            'fotoProduk' => 'required',
        ]);
    }
}
