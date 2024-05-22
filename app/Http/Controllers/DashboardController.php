<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suggestion;
use App\Models\Activity;
use App\Models\DataPenduduk;
use App\Models\Umkm;

class dashboardController extends Controller
{
    public function indexRT()
    {
        $izinUsaha = Umkm::all();
        $suggestions = suggestion::all();
        $activities = Activity::all();
        // $datapenduduk = DataPenduduk::all();
        $breadcrumb = (object)[
            'title' => 'Daftar dashboard',
            'subtitle' => '',
        ];
        return view('RT.dashboardRT', compact('izinUsaha', 'suggestions', 'activities', 'breadcrumb'));
    }
    public function indexRW()
    {
        $izinUsaha = Umkm::all();
        $suggestions = suggestion::all();
        $activities = Activity::all();
        // $datapenduduk = DataPenduduk::all();
        $breadcrumb = (object)[
            'title' => 'Daftar dashboard',
            'subtitle' => '',
        ];
        return view('RW.dashboardRW', compact('izinUsaha', 'suggestions', 'activities', 'breadcrumb'));
    }
    public function indexPD()
    {
        $izinUsaha = Umkm::all();
        $suggestions = suggestion::all();
        $activities = Activity::all();
        // $datapenduduk = DataPenduduk::all();
        $breadcrumb = (object)[
            'title' => 'Daftar dashboard',
            'subtitle' => '',
        ];
        return view('
        Penduduk.dashboardPD', compact('izinUsaha', 'suggestions', 'activities', 'breadcrumb'));
    }
}
