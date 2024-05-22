<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Iuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class IuranController extends Controller
{
    public function kasindexRT()
    {
        $breadcrumb = (object) [
            'title' => 'Kas RT',
            'subtitle' => '',
        ];
        return view('RT/kasIuranRT', ['breadcrumb' => $breadcrumb]);
    }
    public function indexiuranRT()
    {
        $breadcrumb = (object) [
            'title' => 'Iuran',
            'subtitle' => '',
        ];
        return view('RT.iuranRT', ['breadcrumb' => $breadcrumb]);
    }
    public function pengeluaranindexWarga()
    {
        $breadcrumb = (object) [
            'title' => 'Iuran',
            'subtitle' => '',
        ];
        return view('warga/index', ['breadcrumb' => $breadcrumb]);
    }
    public function formWarga()
    {
        $breadcrumb = (object) [
            'title' => 'Iuran',
            'subtitle' => '',
        ];
        return view('warga.form', ['breadcrumb' => $breadcrumb]);
    }
    public function cekdataRT()
    {
        $breadcrumb = (object) [
            'title' => 'Pengeluaran RT',
            'subtitle' => '',
        ];
        return view('RT/cekdataRT', ['breadcrumb' => $breadcrumb]);
    }

    public function dataiuranRT()
    {
        $iuran = Iuran::all();
        $breadcrumb = (object) [
            'title' => 'Data Iuran RT',
            'subtitle' => '',
        ];
        return view('RT/dataiuranRT', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }

    // public function index()
    // {
    //     $breadcrumb = (object) [
    //         'title' => 'Menu Pengumuman',
    //     ];

    //     $page = (object) [
    //         'title' => 'Mengelola Pengumuman'
    //     ];

    //     $activeMenu = 'announcement';

    //     $pengumuman = Pengumuman::all();

    //     return view('rt.announcement.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu], compact('pengumuman'));
    // }

    // public function list(Request $request)
    // {
    //     $pengumuman = Pengumuman::select('id_pengumuman', 'judul', 'isi', 'tanggal', 'foto', 'status_pengumuman');

    //     return DataTables::of($pengumuman)
    //         ->addIndexColumn()
    //         ->addColumn('aksi', function ($pengumuman) {
    //             $btn = '<a href="' . url('/announcement/' . $pengumuman->id_pengumuman) . '" class="btn btn-primary btn-sm mr-1 mb-2" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
    //             $btn .= '<a href="' . url('/announcement/' . $pengumuman->id_pengumuman . '/edit') . '" class="btn btn-warning btn-sm mr-1 mb-2" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-edit"></i></a>';
    //             $btn .= '<form class="d-inline-block" method="POST" action="' . url('/announcement/' . $pengumuman->id_pengumuman) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm mb-2" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini? \');"><i class="fas fa-trash-alt"></i></button></form>';
    //             return $btn;
    //         })
    //         ->rawColumns(['aksi'])
    //         ->make(true);
    // }



    // public function create()
    // {
    //     $breadcrumb = (object) [
    //         'title' => 'Menu Pengumuman',
    //     ];
    //     $activeMenu = 'announcement';
    //     return view('rt.announcement.create', ['activeMenu' => $activeMenu, 'breadcrumb' => $breadcrumb]);
    // }


    // public function store(Request $request)
    // {
    //     // Validasi data
    //     $request->validate([
    //         'rt' => 'required|integer',
    //         'nama' => 'required|string|max:100',
    //         'periode' => 'required|date_format:Y-m',
    //         'total' => 'required|numeric',
    //         'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    //     ]);

    //     // Simpan file bukti
    //     if ($request->hasFile('bukti')) {
    //         $buktiPath = $request->file('bukti')->store('bukti_iuran', 'public');
    //     }

    //     // Buat entri iuran baru
    //     Iuran::create([
    //         'rt' => $request->input('rt'),
    //         'nama' => $request->input('nama'),
    //         'periode' => $request->input('periode'),
    //         'total' => $request->input('total'),
    //         'bukti' => $buktiPath,
    //     ]);

    //     // Redirect atau response
    //     return redirect()->back()->with('success', 'Iuran berhasil disimpan');
    // }

    // public function storeIuran(Request $request)
    // {
    //     // Validasi data
    //     $validatedData = $request->validate([
    //         'rt' => 'required|integer',
    //         'nama' => 'required|string|max:100',
    //         'periode' => 'required|date_format:Y-m',
    //         'total' => 'required|numeric',
    //         'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    //     ]);

    //     // Simpan file bukti
    //     if ($request->hasFile('bukti')) {
    //         $buktiPath = $request->file('bukti')->store('bukti', 'public');
    //     } else {
    //         $buktiPath = null;
    //     }

    //     try {
    //         // Buat entri iuran baru
    //         Iuran::create([
    //             'rt' => $validatedData['rt'],
    //             'nama' => $validatedData['nama'],
    //             'periode' => $validatedData['periode'],
    //             'total' => $validatedData['total'],
    //             'bukti' => $buktiPath,
    //         ]);

    //         // Redirect atau response
    //         return redirect()->back()->with('success', 'Iuran berhasil disimpan');
    //     } catch (\Exception $e) {
    //         // Log error for debugging
    //         Log::error('Error saving iuran: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan iuran');
    //     }
    // }

    public function storeIuran(Request $request)
    {
        // Log the incoming request data
        Log::info('Request data: ', $request->all());

        // Validate data
        $validatedData = $request->validate([
            'rt_id' => 'required|exists:data_rt,id',
            'periode' => 'required|date',
            'total' => 'required|numeric',
            'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Log the validated data
        Log::info('Validated data: ', $validatedData);

        // Save the file
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti', 'public');
        } else {
            $buktiPath = null;
        }

        try {
            // Create a new iuran entry
            Iuran::create([

                'periode' => $validatedData['periode'],
                'total' => $validatedData['total'],
                'bukti' => $buktiPath,
            ]);

            // Log success message
            Log::info('Iuran entry created successfully');

            // Redirect or respond
            return redirect()->back()->with('success', 'Iuran berhasil disimpan');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error saving iuran: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan iuran');
        }
    }


    // public function show(string $id)
    // {
    //     $pengumuman = Pengumuman::findOrFail($id);

    //     $breadcrumb = (object) [
    //         'title' => 'Detail Pengumuman',
    //         'list' => ['Home', 'Pengumuman', 'Detail']
    //     ];

    //     $page = (object) [
    //         'title' => 'Pengumuman'
    //     ];

    //     $activeMenu = 'announcement';

    //     return view('rt.announcement.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'pengumuman' => $pengumuman, 'activeMenu' => $activeMenu], compact('pengumuman'));
    // }


    // public function edit($id)
    // {
    //     $pengumuman = Pengumuman::findOrFail($id);

    //     $breadcrumb = (object) [
    //         'title' => 'Edit Pengumuman',
    //         'list' => ['Home', 'Pengumuman', 'Edit']
    //     ];

    //     $page = (object) [
    //         'title' => 'Edit Pengumuman'
    //     ];

    //     $activeMenu = 'announcement';

    //     return view('rt.announcement.edit', ['activeMenu' => $activeMenu, 'breadcrumb' => $breadcrumb, 'page' => $page], compact('pengumuman'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'judul' => 'required',
    //         'isi' => 'required',
    //         'tanggal' => 'required|date',
    //         'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'status_pengumuman' => 'required|in:aktif,tidak aktif',
    //     ]);

    //     $pengumuman = Pengumuman::findOrFail($id);
    //     $pengumuman->update($request->all());

    //     if ($request->hasFile('foto')) {
    //         $fotoPath = $request->file('foto')->store('pengumuman_foto');
    //         $pengumuman->foto = $fotoPath;
    //         $pengumuman->save();
    //     }

    //     return redirect()->route('announcement')->with('success', 'Pengumuman berhasil diperbarui.');
    // }

    // public function destroy($id)
    // {
    //     $pengumuman = Pengumuman::findOrFail($id);

    //     // Hapus foto terkait jika ada
    //     if ($pengumuman->foto) {
    //         Storage::delete($pengumuman->foto);
    //     }

    //     $pengumuman->delete();

    //     return redirect()->route('announcement')
    //         ->with('success', 'Pengumuman berhasil dihapus.');
    // }
}
