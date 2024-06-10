<?php
namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UmkmController extends Controller
{
    public function indexDataRT() {
        $izinUsaha = Umkm::all();
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Data Usaha RT',
        ];

        return view('RT.dataUsahaRT', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexDataRW() {
        $rts = RT::all();
        $rt_id = auth()->user()->rt_id;
        $izinUsaha = Umkm::all();
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Data Usaha RW',
        ];

        return view('RW.dataUsahaRW', compact('izinUsaha', 'rts'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexIzinRT() {
        $rt_id = auth()->user()->rt_id;
        $izinUsaha = Umkm::where('rt_id', $rt_id)->get();
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Izin Usaha RT',
        ];

        return view('RT.izinUsahaRT', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexIzinRW() {
        $izinUsaha = Umkm::all();
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Izin Usaha RW',
        ];

        return view('RW.izinUsahaRW', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexIzinPenduduk() {
        $user = auth()->user()->user_id;
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Izin Usaha Penduduk',
        ];
        $izinUsaha = Umkm::where('user_id', $user)->get(); // Assuming Umkm is the model for your izinUsaha
        $rts = RT::all();
        return view('Penduduk.izinUsahaPenduduk', compact('izinUsaha', 'rts', 'breadcrumb', 'user'));
    }

    public function indexDataPenduduk() {
        $izinUsaha = Umkm::all();
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Data Usaha Penduduk',
        ];

        return view('Penduduk.dataUsahaPenduduk', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexDetailIzinPenduduk($id) {
        $izinUsaha = Umkm::findOrFail($id);
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Detail Izin Usaha Penduduk',
        ];

        return view('Penduduk.detailIzinUsaha', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexDetailIzinRT($id) {
        $izinUsaha = Umkm::findOrFail($id);
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Detail Izin Usaha Warga',
        ];

        return view('RT.detailIzinUsahaRT', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexDetailIzinRW($id) {
        $izinUsaha = Umkm::findOrFail($id);
        $rts = RT::all();
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Detail Izin Usaha Warga',
        ];

        return view('RW.detailIzinUsahaRW', compact('izinUsaha', 'rts'), ['breadcrumb' => $breadcrumb]);
    }

    public function showUmkm() {
        $izinUsaha = Umkm::all();
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Izin Usaha Penduduk',
        ];
        $rts = RT::all();
        return view('Penduduk.izinUsahaPenduduk', compact('izinUsaha','rts'), ['breadcrumb' => $breadcrumb]);
    }

    // public function storeIzin(Request $request) {
    //     $validateData = $request->validate([
    //         'nama_warga' => 'required',
    //         'nama_usaha' => 'required',
    //         'deskripsi' => 'required',
    //         'foto_produk' => 'image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     // if($request->file('fotoProduk')) {
    //     //     $validateData['fotoProduk'] = $request->file('fotoProduk')->store('foto-produk');
    //     // }

    //     Umkm::create([
    //         'nama_warga' => $validateData['nama_warga'],
    //         'nama_usaha' => $validateData['nama_usaha'],
    //         'deskripsi' => $validateData['deskripsi'],
    //         'foto_produk' => $request->file('foto_produk')->store('foto-produk'),
    //     ]);

    //     return redirect()->route('izinUsahaPenduduk')->with('success', 'Data berhasil disimpan');
    // }

    public function storeIzin(Request $request) {
        $validatedData = $request->validate([
            'nama_warga' => 'required|string',
            'user_id' => 'required|int',
            'nama_usaha' => 'required|string',
            'deskripsi' => 'required|string',
            'foto_produk' => 'image|mimes:jpeg,png,jpg',
            'rt_id' => 'required|exists:rts,id',
        ]);

        // Periksa apakah file gambar telah diunggah sebelum menyimpannya
        if ($request->hasFile('foto_produk')) {
            $foto_produk = $request->file('foto_produk')->store('foto-produk');
        } else {
            $foto_produk = null; // Atau sesuaikan dengan logika bisnis Anda
        }

        // Simpan data izin usaha ke dalam database menggunakan model Umkm
        Umkm::create([
            'nama_warga' => $validatedData['nama_warga'],
            'user_id' => $validatedData['user_id'],
            'nama_usaha' => $validatedData['nama_usaha'],
            'deskripsi' => $validatedData['deskripsi'],
            'foto_produk' => $foto_produk, // Simpan nama file gambar jika ada, atau null jika tidak
            'rt_id' => $validatedData['rt_id'],
        ]);

        return redirect()->back()->with('success', 'Data izin usaha berhasil disimpan.');
    }


    public function edit($id) {
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Edit Izin Usaha Penduduk',
        ];
        $umkm = Umkm::find($id);
        return view('Penduduk.editIzinUsaha', compact('umkm'), ['breadcrumb' => $breadcrumb]);
    }

    // public function update(Request $request, $id) {
    //     $request->validate([
    //         'namaLengkap' => 'required',
    //         'namaUsaha' => 'required',
    //         'deskripsiUsaha' => 'required',
    //         'fotoProduk' => 'required',
    //     ]);
    //     Umkm::find($id)->update($request->all());
    //     return redirect()->route('Penduduk.izinUsahaPenduduk')->with('success', 'Data berhasil diperbaruhi');
    // }

    // public function update(Request $request, $id) {
    //     $request->validate([
    //         'nama_warga' => 'required',
    //         'nama_usaha' => 'required',
    //         'deskripsi' => 'required',
    //         'foto_produk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $umkm = Umkm::findOrFail($id);

    //     // Periksa apakah ada file foto produk yang diunggah
    //     if ($request->hasFile('foto_produk')) {
    //         // Hapus foto produk yang lama jika ada
    //         if (Storage::exists($umkm->foto_produk)) {
    //             Storage::delete($umkm->foto_produk);
    //         }

    //         // Simpan foto produk yang baru
    //         $umkm->foto_produk = $request->file('foto_produk')->store('foto-produk');
    //     }

    //     // Update data umkm
    //     $umkm->nama_warga = $request->nama_warga;
    //     $umkm->nama_usaha = $request->nama_usaha;
    //     $umkm->deskripsi = $request->deskripsi;
    //     $umkm->save();

    //     return redirect()->route('Penduduk.izinUsahaPenduduk')->with('success', 'Data berhasil diperbarui');
    // }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_warga' => 'required',
            'nama_usaha' => 'required',
            'deskripsi' => 'required',
            'foto_produk' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // pastikan untuk validasi file gambar
        ]);

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('foto_produk')) {
            // Simpan file gambar yang diunggah ke penyimpanan yang diinginkan
            $imagePath = $request->file('foto_produk')->store('public/images');

            // Mengambil nama file gambar untuk disimpan di database
            $fileName = basename($imagePath);
        } else {
            // Jika tidak ada file gambar yang diunggah, gunakan nama file gambar yang lama
            $fileName = $request->oldFotoProduk;
        }

        // Update data Umkm
        $umkm = Umkm::findOrFail($id);
        $umkm->nama_warga = $request->nama_warga;
        $umkm->nama_usaha = $request->nama_usaha;
        $umkm->deskripsi = $request->deskripsi;
        $umkm->foto_produk = $fileName; // nama file gambar yang baru atau yang lama
        $umkm->save();

        // Redirect kembali ke halaman izinUsahaPenduduk dengan pesan sukses
        return redirect()->route('izinUsahaPenduduk')->with('success', 'Data berhasil diperbarui');
    }



    public function updateStatus(Request $request, $id) {
        if (Auth::user()->role !== 'rt' && Auth::user()->role !== 'rw') {
            return response()->json(['message' => 'Anda tidak memiliki izin untuk mengubah status.'], 403);
        }
        $umkm = Umkm::findOrFail($id);

        if (Auth::user()->role === 'rt') {
            $umkm->status_rt = $request->status_rt;
        } elseif (Auth::user()->role === 'rw') {
            $umkm->status_rw = $request->status_rw;
        }

        $umkm->save();

        return response()->json(['message' => 'Status berhasil diperbaruhi.']);
    }

    public function destroy($id) {
        Umkm::destroy($id);
        return redirect()->route('izinUsahaPenduduk')->with('success', 'Data berhasil dihapus');
    }

    public function getDataById($id) {
        $izinUsaha = Umkm::findOrFail($id);
        return response()->json($izinUsaha);
    }

    public function accIzinRT($id) {
        $izinUsaha = Umkm::find($id);

        $izinUsaha->status_rt = 'disetujui';
        $izinUsaha->save();
        return redirect(route('izinUsahaRT'));
    }

    public function accIzinRW($id) {
        $izinUsaha = Umkm::find($id);

        $izinUsaha->status_rw = 'disetujui';
        $izinUsaha->save();
        return redirect(route('izinUsahaRW'));
    }

    public function tolakIzinRT($id) {
        $izinUsaha = Umkm::find($id);

        $izinUsaha->status_rt = 'izin ditolak';
        $izinUsaha->save();
        return redirect(route('izinUsahaRT'));
    }

    public function tolakIzinRW($id) {
        $izinUsaha = Umkm::find($id);

        $izinUsaha->status_rw = 'izin ditolak';
        $izinUsaha->save();
        return redirect(route('izinUsahaRW'));
    }
}
