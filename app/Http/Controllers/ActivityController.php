<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity; // Import model Kegiatan
use App\Models\DataRt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

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
        return view('Penduduk.detailKegiatanPD', compact('activity', 'breadcrumb'));
    }
    // Show
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
            'document' => 'nullable|file',
        ]);
        $activity = new Activity($request->only(['name', 'description', 'rt_id', 'document']));
        $activity->status = 'pending';
        $activity->save();
        return redirect(route('tambahEditKegiatanPD'));
    }

    public function updateKegiatan(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'rt_id' => 'required|exists:data_rt,id',
            'document' => 'nullable|file',
            'id' => 'required|exists:activities',
        ]);

        $activity = Activity::findOrFail($request->post('id'));


        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->rt_id = $request->rt_id;

        // Masukkan dokumen jika ada
        $activity->document = uploadDocument($request->file('document'), $activity->document);
        $activity->save();

        return redirect(route('tambahEditKegiatanPD'));
    }
    public function deleteKegiatan(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:activities',
        ]);

        $activity = Activity::findOrFail($request->id);

        // Hapus dokumen terkait jika ada
        if ($activity->document) {
            $deletePath = public_path($activity->document);
            if (file_exists($deletePath)) {
                File::delete($deletePath);
            }
        }

        $activity->delete();

        return redirect(route('tambahEditKegiatanPD'));
    }
}
