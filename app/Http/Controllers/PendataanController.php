<?php

namespace App\Http\Controllers;

use App\Models\Pendataan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PendataanController extends Controller
{
    public function indexDataRT() {
        $dataRT = Pendataan::all();
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Data Rukun Tetangga (RT)',
        ];

        return view('RT.dataRT', compact('dataRT'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexDataKK() {
        $dataKK = Pendataan::all();
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Data Kartu Keluarga (KK)',
        ];

        return view('KK.dataRT', compact('dataKK'), ['breadcrumb' => $breadcrumb]);
    }
    public function indexDataPenduduk() {
        $penduduk = Pendataan::all();
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Data Penduduk',
        ];

        return view('Penduduk.dataPenduduk', compact('penduduk'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexDetailDataRT($id) {
        $dataRT = Pendataan::findOrFail($id);
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Data Rukun Tetangga (RT)',
        ];

        return view('RT.detailDataRT', compact('dataRT'), ['breadcrumb' => $breadcrumb]);
    }
    public function indexDetailDataKK($id) {
        $dataKK = Pendataan::findOrFail($id);
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Data Kartu Keluarga (KK)',
        ];

        return view('KK.detailDataKK', compact('dataKK'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexDetailDataPenduduk($id) {
        $penduduk = Pendataan::findOrFail($id);
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Data Penduduk',
        ];

        return view('Penduduk.detailDataPenduduk', compact('penduduk'), ['breadcrumb' => $breadcrumb]);
    }

    public function showDataRT() {
        $dataRT = Pendataan::all();
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Data Rukun Tetangga (RT)',
        ];
        return view('RT.dataRT', compact('dataRT'), ['breadcrumb' => $breadcrumb]);
    }
}
