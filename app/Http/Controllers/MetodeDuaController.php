<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetodeDuaController extends Controller
{

    public function indexAlternatif()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Alternatif (Metode II)',
            'subtitle' => 'Data Alternatif',
        ];
        // $activities = Activity::all(); // Mengambil semua data kegiatan dari model Kegiatan

        return view('metode_dua_spk.alternatifdestinasi2', ['breadcrumb' => $breadcrumb]);
    }
    public function indexkriteria()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kriteria (Metode II)',
            'subtitle' => 'Data Kriteria',
        ];
        // $activities = Activity::all(); // Mengambil semua data kegiatan dari model Kegiatan

        return view('metode_dua_spk.kriteriadestinasi2', ['breadcrumb' => $breadcrumb]);
    }
    public function indexPenilaian()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Penilain (Metode II)',
            'subtitle' => 'Data Penilain',
        ];
        // $activities = Activity::all(); // Mengambil semua data kegiatan dari model Kegiatan

        return view('metode_dua_spk.penilaiandestinasi2', ['breadcrumb' => $breadcrumb]);
    }
    public function indexRanking()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Ranking (Metode II)',
            'subtitle' => 'Data Ranking',
        ];
        // $activities = Activity::all(); // Mengambil semua data kegiatan dari model Kegiatan

        return view('metode_dua_spk.rankingdestinasi2', ['breadcrumb' => $breadcrumb]);
    }
}
