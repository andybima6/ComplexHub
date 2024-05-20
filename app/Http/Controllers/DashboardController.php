<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suggestion;
use App\Models\Activity;
use App\Models\DataPenduduk;
use App\Models\Umkm;

class dashboardController extends Controller
{
    public function index()
    {
        $izinUsaha = Umkm::all();
        $suggestions = suggestion::all();
        $activities = Activity::all();
        // $datapenduduk = DataPenduduk::all();
        $breadcrumb = (object)[
            'title' => 'Daftar dashboard',
            'subtitle' => '',
        ];
        return view ('dashboard', compact('izinUsaha', 'suggestions', 'activities',), ['breadcrumb'=>$breadcrumb]);
    }
}
