<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity; // Import model Kegiatan
use App\Models\DataRt;
use Illuminate\Support\Facades\Gate;

class ActivityController extends Controller
{
    public function indexRT()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
            'subtitle' => '',
        ];
        $kegiatans = Activity::all(); // Mengambil semua data kegiatan dari model Kegiatan

        return view('RT.usulanKegiatanRT', ['breadcrumb' => $breadcrumb], compact('kegiatans'));
    }

    // Metode lainnya...


    public function indexRW()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
            'subtitle' => '',
        ];
        return view('RW.usulanKegiatanRW', ['breadcrumb' => $breadcrumb]);
    }
    public function indexPenduduk()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
            'subtitle' => '',
        ];
        return view('Penduduk.usulanKegiatanPD', ['breadcrumb' => $breadcrumb]);
    }

    public function indexDetailIzinRT()
    {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => '',
        ];

        return view('RT.detailKegiatanRT', ['breadcrumb' => $breadcrumb]);
    }
    public function indexDetailIzinRW()
    {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => '',
        ];

        return view('RW.detailKegiatanRW', ['breadcrumb' => $breadcrumb]);
    }
    public function indexDetailIzinPenduduk($id)
    {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => '',
        ];

        // $activity = Activity::where()
        $activity = Activity::findOrFail($id);
        return view('penduduk.detailKegiatanPD', compact('activity'));
    }
    public function indexTambahIzinPenduduk(Request $request)
    {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => '',
        ];

        $rtId = 1;
        $rt = DataRt::with(['activities'])->findOrFail($rtId);
        $activities = $rt->activities;
        // $rt = $request->user()->rt

        return view('Penduduk.tambahEditKegiatanPD', compact('activities', 'breadcrumb'));
    }

    public function storeKegiatan(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'rt_id' => 'required|exists:data_rt,id',
            'document' => 'string',
        ]);
        $activity = new Activity($request->only(['name', 'description', 'rt_id', 'document']));
        $activity->status = 'pending';
        $activity->save();
        return redirect(route('tambahEditKegiatanPD'));
    }
    public function showKegiatan($id)
    {
        $activity = Activity::findOrFail($id);
        return view('penduduk.detailKegiatanPD', compact('activity'));
    }
}
