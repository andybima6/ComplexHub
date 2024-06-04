<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DestinasiController extends Controller
{
    public function indexRW()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Pemilihan Destinasi Wisata',
            'subtitle' => 'dengan Metode Sistem Pendukung Keputusan'
        ];
        return view('RW.destinasiwisataRW', ['breadcrumb' => $breadcrumb]);
    }

    public function indexberanda()
    {
    $user = auth()->user();

    $breadcrumb = (object)[
        'title' => 'Pemilihan Destinasi Wisata (SAW)',
        'subtitle' => 'Daftar Destinasi Wisata',
    ];

    return view('RW.berandadestinasiRW', ['breadcrumb' => $breadcrumb]);
    }

    public function indexDestinasi()
    {
    $user = auth()->user();

    $breadcrumb = (object)[
        'title' => 'Pemilihan Destinasi Wisata (SAW)',
        'subtitle' => 'Daftar Alternatif Destinasi Wisata',
    ];

    return view('Destinasi.alternatifdestinasiRW', ['breadcrumb' => $breadcrumb]);
    }

    public function indexkriteria()
    {
    $user = auth()->user();

    $breadcrumb = (object)[
        'title' => 'Pemilihan Destinasi Wisata (SAW)',
        'subtitle' => 'Daftar Kriteria',
    ];

    return view('kriteria.kriteriadestinasiRW', ['breadcrumb' => $breadcrumb]);
    }

    // public function indexbobot()
    // {
    // $user = auth()->user();

    // $breadcrumb = (object)[
    //     'title' => 'Pemilihan Destinasi Wisata (Metode 1)',
    //     'subtitle' => 'Ubah Bobot Kriteria',
    // ];

    // return view('bobot.bobotdestinasiRW', ['breadcrumb' => $breadcrumb]);
    // }

    public function indexpenilaian()
    {
    $user = auth()->user();

    $breadcrumb = (object)[
        'title' => 'Pemilihan Destinasi Wisata (SAW)',
        'subtitle' => 'Penilaian',
    ];

    return view('penilaian.penilaiandestinasiRW', ['breadcrumb' => $breadcrumb]);
    }

    public function indexranking()
    {
    $user = auth()->user();

    $breadcrumb = (object)[
        'title' => 'Pemilihan Destinasi Wisata (SAW)',
        'subtitle' => 'Hasil Perhitungan',
    ];

    return view('ranking.rankingdestinasiRW', ['breadcrumb' => $breadcrumb]);
    }

    public function indexPenduduk()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Pemilihan Destinasi Wisata',
            'subtitle' => 'Dengan Metode SAW',
        ];
        return view('Penduduk.destinasiwisataPD', ['breadcrumb' => $breadcrumb]);
    }

}
