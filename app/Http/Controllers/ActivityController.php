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
            // Mendapatkan rt_id pengguna yang sedang login
            $rt_id = auth()->user()->rt_id;

            $breadcrumb = (object)[
                'title' => 'Daftar Kegiatan',
                'subtitle' => 'Usulan Kegiatan',
            ];

            // Mengambil data kegiatan berdasarkan rt_id pengguna
            $activities = Activity::where('rt_id', $rt_id)->get();
            $rts = RT::where('id', $rt_id)->get();

            return view('RT.usulanKegiatanRT', compact('activities', 'breadcrumb','rts'));
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
            $rts = rt::all();
            return view('RW.usulanKegiatanRW', ['breadcrumb' => $breadcrumb], compact('activities', 'rts'));
        }
        public function indexPenduduk()
        {
            $user = auth()->user();
            $userid = $user->id;
            $breadcrumb = (object)[
                'title' => 'Daftar Kegiatan',
                'subtitle' => 'Usulan Kegiatan',
            ];
            $rts = RT::all();
            $activities = Activity::where('user_id', $userid)->get();
            return view('Penduduk.usulanKegiatanPD', ['breadcrumb' => $breadcrumb], compact('rts', 'activities','user','breadcrumb'));
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
            $user = auth()->user();
            $userid = $user->id;
            $breadcrumb = (object)[
                'title' => 'Daftar Kegiatan',
                'subtitle' => 'Usulan Kegiatan',
            ];
            $rts = RT::all();
            $activities = Activity::where('user_id', $userid)->get();
            return view('Penduduk.tambahEditKegiatanPD', ['breadcrumb' => $breadcrumb], compact('rts', 'activities','user','breadcrumb'));
        }

        public function storeKegiatan(Request $request)
        {
            $request->validate([
                'user_id' => 'required|int',
                'name' => 'required|string',
                'description' => 'required|string',
                'rt_id' => 'required|exists:rts,id',
                'document' => 'nullable|file',
            ]);

            $activity = new Activity($request->only(['name', 'description', 'rt_id']));
            $activity->document = uploadDocument($request->file('document'), $activity->document);
            $activity->status = 'pending';
            $activity->save();

            // Redirect langsung ke view tambahEditKegiatanPD dengan menyertakan ID kegiatan baru
            return redirect()->route('tambahEditKegiatanPD', ['id' => $activity->id]);
        }

        public function updateKegiatan(Request $request)
        {
            $request->validate([
                'user_id' => 'required|int',
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

            // Redirect langsung ke view tambahEditKegiatanPD dengan menyertakan ID kegiatan yang diperbarui
            return redirect()->route('tambahEditKegiatanPD', ['id' => $activity->id]);
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
