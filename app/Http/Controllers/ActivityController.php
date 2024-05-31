<?php

namespace App\Http\Controllers;

use App\Models\RT;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Models\Activity; // Import model Kegiatan

class ActivityController extends Controller
{
    public function indexRT()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
            'subtitle' => 'Usulan Kegiatan',
        ];
        $activities = Activity::all(); // Mengambil semua data kegiatan dari model Kegiatan

        return view('RT.usulanKegiatanRT', ['breadcrumb' => $breadcrumb], compact('activities'));
    }

    // Metode lainnya...


    public function indexRW()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
            'subtitle' => 'Usulan Kegiatan',
        ];
        $activities = Activity::all(); // Mengambil semua data kegiatan dari model Kegiatan

        return view('RW.usulanKegiatanRW', ['breadcrumb' => $breadcrumb], compact('activities'));
    }
    public function indexPenduduk()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
            'subtitle' => 'Usulan Kegiatan',
        ];

        return view('Penduduk.usulanKegiatanPD', ['breadcrumb' => $breadcrumb]);
    }

    public function indexDetailIzinRT($id)
    {

        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => 'Usulan Kegiatan',
        ];
        $activity = Activity::findOrFail($id);
        return view('RT.detailKegiatanRT', compact('activity', 'breadcrumb'));
    }

    public function indexDetailIzinRW($id)
    {
        $user = auth()->user();
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => 'Usulan Kegiatan',
        ];
        $activity = Activity::findOrFail($id);
        return view('RW.detailKegiatanRW', compact('activity', 'breadcrumb'));
    }
    public function indexDetailIzinPenduduk($id)
    {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => 'Usulan Kegiatan',
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
            'subtitle' => 'Usulan Kegiatan',
        ];

        // $rtId = 1;
        // $rt = RT::with(['activities'])->findOrFail($rtId);
        // $activities = $rt->activities;
        $activities = Activity::all();
        $rts = RT::all();
        // $rt = $request->user()->rt

        return view('Penduduk.tambahEditKegiatanPD', compact('activities', 'breadcrumb','rts'));
    }

    public function storeKegiatan(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
             'rt_id' => 'required|exists:rts,id',
            'document' => 'nullable|file',
        ]);
        $activity = new Activity($request->only(['name', 'description', 'rt_id']));
        $activity->document = uploadDocument($request->file('document'), $activity->document);
        $activity->status = 'pending';
        $activity->save();
        return redirect(route('tambahEditKegiatanPD'));
    }

    public function updateKegiatan(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
             'rt_id' => 'required|exists:rts,id',
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

        return response()->json([
            'success' => true,
        ]);
    }
    public function rejectKegiatanRT($id)
    {
        $activity = Activity::find($id);

        if (!$activity) {
            return response()->json([
                'success' => false,
                'message' => 'Kegiatan tidak ditemukan.'
            ], 404);
        }

        $activity->status = 'rejected';
        $activity->save();

        return redirect(route('usulanKegiatanRT'));

    }

    public function accKegiatanRT($id)
    {
        $activity = Activity::find($id);

        if (!$activity) {
            return response()->json([
                'success' => false,
                'message' => 'Kegiatan tidak ditemukan.'
            ], 404);
        }

        $activity->status = 'accepted';
        $activity->save();

        return redirect(route('usulanKegiatanRT'));

    }
    public function rejectKegiatanRW($id)
    {
        $activity = Activity::find($id);

        if (!$activity) {
            return response()->json([
                'success' => false,
                'message' => 'Kegiatan tidak ditemukan.'
            ], 404);
        }

        $activity->status = 'rejected';
        $activity->save();

        return redirect(route('usulanKegiatanRW'));

    }

    public function accKegiatanRW($id)
    {
        $activity = Activity::find($id);

        if (!$activity) {
            return response()->json([
                'success' => false,
                'message' => 'Kegiatan tidak ditemukan.'
            ], 404);
        }

        $activity->status = 'accepted';
        $activity->save();

        return redirect(route('usulanKegiatanRW'));

    }

}
