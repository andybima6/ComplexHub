<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenilaianController extends Controller
{
    public function index()
{
    // $user = auth()->user();
        $breadcrumb = (object)[
            'title' => 'Daftar Penilaian (Metode SAW)',
            'subtitle' => 'Data Penilaian',
        ];
    $alternatifs = Alternatif::with('nilaiKriteria')->get();
    $kriterias = Kriteria::all();
    
    return view('penilaian.index', compact('alternatifs', 'kriterias', 'breadcrumb'));
}

public function show()
{
    // Lakukan operasi yang diperlukan untuk mempersiapkan data
    // Misalnya, jika Anda perlu menghitung skor, Anda dapat melakukan itu di sini
    $skor = []; // Anda perlu mengisi ini dengan data skor sesuai kebutuhan aplikasi Anda
    $alternatifs = Alternatif::all(); // Anda mungkin perlu mengambil data alternatif sesuai kebutuhan

    // Tampilkan view hasil penilaian dengan data yang sudah disiapkan
    return view('penilaian.hasil', compact('skor', 'alternatifs'));
}

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Penilaian (Metode SAW)',
            'subtitle' => 'Pengisian Data Penilaian',
        ];

        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        return view('penilaian.create', compact('alternatifs', 'kriterias', 'breadcrumb'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nilai.*.*' => 'required|numeric', // Menyatakan bahwa setiap nilai harus ada dan harus numerik
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan nilai alternatif ke dalam basis data
        foreach ($request->nilai as $alternatif_id => $nilai_kriteria) {
            foreach ($nilai_kriteria as $kriteria_id => $nilai) {
                NilaiAlternatif::updateOrCreate(
                    ['alternatif_id' => $alternatif_id, 'kriteria_id' => $kriteria_id],
                    ['nilai' => $nilai]
                );
            }
        }

        // Redirect ke halaman indeks penilaian
        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil disimpan.');
    }




    // public function store(Request $request)
    // {
    //     // dd($request->alternatif_id, $request->kriteria_id);

    //     foreach ($request->alternatif_id as $alternatif_id) {
    //         foreach ($request->kriteria_id as $kriteria_id => $nilai) {
    //             NilaiAlternatif::updateOrCreate(
    //                 ['alternatif_id' => $alternatif_id, 'kriteria_id' => $kriteria_id],
    //                 ['nilai' => $nilai]
    //             );
    //         }
    //     }
    //     return redirect()->route('penilaian.index');
    // }

    public function edit($id)
    {
        $breadcrumb = (object)[
            'title' => 'Edit Penilaian (Metode SAW)',
            'subtitle' => '',
        ];

        $alternatif = Alternatif::findOrFail($id);
        $kriterias = Kriteria::all(); // Asumsikan Anda memiliki model Kriteria
    
        return view('penilaian.edit', compact('alternatif', 'kriterias', 'breadcrumb'));
    }
    


    public function update(Request $request, $id)
{
    $alternatif = Alternatif::findOrFail($id);

    foreach ($request->input('nilai') as $kriteriaId => $nilai) {
        $alternatif->nilaiKriteria()->updateOrCreate(
            ['kriteria_id' => $kriteriaId],
            ['nilai' => $nilai]
        );
    }

    return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil diperbarui.');
}


}

