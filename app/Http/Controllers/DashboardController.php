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
        $users = User::where('rt_id', $user->rt_id)->get();

        $izinUsaha = Umkm::all();
        $suggestions = suggestion::where('user_id', $user->id)->get();
        $activities = Activity::where('user_id', $user->id)->get();
        $iuran = Iuran::where('rt_id', $user->rt_id)->sum('total');
        // $datapenduduk = DataPenduduk::all();

        // $datapenduduk = DataPenduduk::where('user_id', $user->id)->get();
        // $anggotaKeluarga = AnggotaKeluarga::where('user_id', $user->id)->get();
        $breadcrumb = (object)[
            'title' => 'Daftar dashboard',
            'subtitle' => '',
        ];
        return view('dashboardRT', compact('izinUsaha', 'suggestions', 'activities', 'breadcrumb', 'user', 'users', 'iuran'));
    }

    public function indexRW()
    {
        $user = auth()->user();
        $users = User::where('rt_id', $user->rt_id)->get();

        $izinUsaha = Umkm::all();
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
        return view('dashboardRW', compact('izinUsaha', 'suggestions', 'activities', 'breadcrumb', 'user', 'users', 'iuran'));
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
        return view('dashboardPD', compact('izinUsaha', 'suggestions', 'activities', 'breadcrumb', 'user', 'users', 'iuran'));
    }

    public function getChartData()
    {
        // Ambil data user_id dan rt_id dari database, dan filter out rt_id = 0
        $users = User::where('rt_id', '!=', 0)->select('id', 'rt_id')->get();

        // Kelompokkan user_id berdasarkan rt_id
        $data = $users->groupBy('rt_id')->map(function ($group) {
            return $group->count();
        });

        return response()->json($data);
    }

}
