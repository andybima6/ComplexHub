<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suggestion;
use App\Models\Activity;
use App\Models\DataPenduduk;
use App\Models\Umkm;
use App\Models\AnggotaKeluarga;
use App\Models\Iuran;
use App\Models\User;

class dashboardController extends Controller
{
    public function indexRT()
    {
        $izinUsaha = Umkm::all();
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => '',
        ];
        return view('dashboardRT', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }
    public function indexRW()
    {
        $user = auth()->user();
        $izinUsaha = Umkm::all();
        $suggestions = suggestion::all();
        $activities = Activity::all();
        // $datapenduduk = DataPenduduk::all();
        $anggotaKeluarga = AnggotaKeluarga::all();
        $breadcrumb = (object)[
            'title' => 'Daftar dashboard',
            'subtitle' => '',
        ];
        return view('dashboardRW', compact('izinUsaha', 'suggestions', 'activities', 'breadcrumb'));
    }
    public function indexPD()
    {
        $user = auth()->user();
        $users = User::all();
        $izinUsaha = Umkm::all();
        $suggestions = suggestion::all();
        $activities = Activity::all();
        $iuran = Iuran::sum('total');
        // $datapenduduk = DataPenduduk::all();
        $anggotaKeluarga = AnggotaKeluarga::all();
        $breadcrumb = (object)[
            'title' => 'Daftar dashboard',
            'subtitle' => '',
        ];
        return view('dashboardPD', compact('izinUsaha', 'suggestions', 'activities', 'breadcrumb', 'user', 'users', 'iuran'));
    }
}
