<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use App\Models\Iuran;
use App\Models\Activity;
use App\Models\suggestion;
use App\Models\DataPenduduk;
use Illuminate\Http\Request;
use App\Models\AnggotaKeluarga;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
        $iuran = Iuran::where('user_id', $user->id)->sum('total');
        // $datapenduduk = DataPenduduk::all();

        // $datapenduduk = DataPenduduk::where('user_id', $user->id)->get();
        // $anggotaKeluarga = AnggotaKeluarga::where('user_id', $user->id)->get();
        $breadcrumb = (object)[
            'title' => 'Daftar dashboard',
            'subtitle' => '',
        ];
        return view('dashboardPD', compact('izinUsaha', 'suggestions', 'activities', 'breadcrumb', 'user', 'users', 'iuran'));
    }

    public function getChartDataPD()
    {
        // Ambil data user_id dan rt_id dari database, dan filter out rt_id = 0
        $keluarga = AnggotaKeluarga::where('kk_id', '!=', 0)->select('id', 'kk_id')->get();

        // Kelompokkan user_id berdasarkan rt_id
        $data = $keluarga->groupBy('kk_id')->map(function ($group) {
            return $group->count();
        });

        return response()->json($data);
    }

    public function getChartDataRT()
    {
        // Ambil data user_id dan rt_id dari database, dan filter out rt_id = 0
        $keluarga = AnggotaKeluarga::where('kk_id', '!=', 0)->select('id', 'kk_id')->get();

        // Kelompokkan user_id berdasarkan rt_id
        $data = $keluarga->groupBy('kk_id')->map(function ($group) {
            return $group->count();
        });

        return response()->json($data);
    }
    public function getChartDataRW()
    {
        // Ambil data user_id dan rt_id dari database, dan filter out rt_id = 0
        $keluarga = AnggotaKeluarga::where('kk_id', '!=', 0)->select('id', 'kk_id')->get();

        // Kelompokkan user_id berdasarkan rt_id
        $data = $keluarga->groupBy('kk_id')->map(function ($group) {
            return $group->count();
        });

        return response()->json($data);
    }
    public function getIuranDataPD(Request $request)
    {
        $userId = Auth::id(); // Get the ID of the authenticated user
        Log::info('User ID: ' . $userId);

        // Mengambil data iuran dari database untuk user_id tertentu
        $data = Iuran::selectRaw('MONTH(periode) as month, SUM(total) as total')
                     ->where('user_id', $userId)
                     ->groupBy('month')
                     ->get()
                     ->pluck('total', 'month')
                     ->toArray();

        Log::info('Iuran Data: ' . json_encode($data));

        // Menghitung total keseluruhan iuran
        $totalIuran = array_sum($data);
        Log::info('Total Iuran: ' . $totalIuran);

        // Menghitung persentase per bulan
        $dataPersentase = [];
        foreach ($data as $month => $total) {
            $dataPersentase[$month] = ($total / $totalIuran) * 100;
        }

        Log::info('Data Persentase: ' . json_encode($dataPersentase));

        return response()->json($dataPersentase);
    }


public function getIuranDataRT(Request $request)
{
    $user = Auth::user(); // Get the authenticated user
    $rtId = $user->rt_id; // Assume rt_id is a column in the users table

    Log::info('RT ID: ' . $rtId);

    // Mengambil data iuran dari database untuk rt_id tertentu
    $data = Iuran::selectRaw('MONTH(periode) as month, SUM(total) as total')
                 ->where('rt_id', $rtId)
                 ->groupBy('month')
                 ->get()
                 ->pluck('total', 'month')
                 ->toArray();

    Log::info('Iuran Data: ' . json_encode($data));

    // Menghitung total keseluruhan iuran
    $totalIuran = array_sum($data);
    Log::info('Total Iuran: ' . $totalIuran);

    // Menghitung persentase per bulan
    $dataPersentase = [];
    foreach ($data as $month => $total) {
        $dataPersentase[$month] = ($total / $totalIuran) * 100;
    }

    Log::info('Data Persentase: ' . json_encode($dataPersentase));

    return response()->json($dataPersentase);
}

}
