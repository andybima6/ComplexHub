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
    public function indexRW()
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
    public function indexPD()
    {
        $user = auth()->user();
        $users = User::where('rt_id', $user->rt_id)->get();

        $izinUsaha = Umkm::where('user_id', $user->id)->get();
        $suggestions = suggestion::where('user_id', $user->id)->get();
        $activities = Activity::where('user_id', $user->id)->get();
        $iuran = Iuran::sum('total');
        // $datapenduduk = DataPenduduk::all();

        // $datapenduduk = DataPenduduk::where('user_id', $user->id)->get();
        // $anggotaKeluarga = AnggotaKeluarga::where('user_id', $user->id)->get();
        $breadcrumb = (object)[
            'title' => 'Daftar dashboard',
            'subtitle' => '',
        ];
        return view('dashboardPD', compact('izinUsaha', 'suggestions', 'activities', 'breadcrumb', 'user', 'users','iuran'));
    }

}
