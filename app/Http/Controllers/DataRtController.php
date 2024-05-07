<?php

namespace App\Http\Controllers;

use App\Models\DataRt;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataRtController extends Controller
{
    public function index()
{
    $data = DataRt::all();

<<<<<<< HEAD
    return view('data_rt.index', compact('data'));
}
=======

        $dataRt = DataRt::with(['activities'])->get();
        return view('data_rt.index', compact('dataRt', 'breadcrumb'));
    }

    public function create()
    {
        $breadcrumb = (object) ['title' => 'Tambah Data RT'];
        $dataRt = DataRt::all(); // Misalnya mengambil semua data RT dari model DataRt
        return view('data_rt.create', compact('breadcrumb', 'dataRt'));
    }
>>>>>>> aa61c87e3e35ef9b6c392ce98975e432322353e1



    public function store(Request $request)
<<<<<<< HEAD
=======
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'rt' => 'required|string|max:255',
            'periode_awal' => 'required|string|max:255',
            'periode_akhir' => 'required|string|max:255',
        ]);

        // Simpan data RT baru
        $dataRt = DataRt::create($validatedData);

        // Redirect ke halaman index RT setelah berhasil menyimpan
        return redirect()->route('data_rt.index')->with('success', 'Data RT berhasil disimpan');
    }

    public function show(DataRt $dataRt)
>>>>>>> aa61c87e3e35ef9b6c392ce98975e432322353e1
    {
        $request->validate([
            'nama' => 'required',
            'rt' => 'required',
            'periode_awal' => 'required',
            'periode_akhir' => 'required'
        ]);

        $rt = User::create([
            'name' => $request->nama,
            'email' => 'rt' . $request->data_rt . '@gmail.com', 
            'password' => bcrypt('password'),
        ]);

        $data = new DataRt();
        $data->nama = $request->nama;
        $data->data_rt = $request->data_rt;
        $data->periode_awal = $request->periode_awal;
        $data->periode_akhir = $request->periode_akhir;
        $data->user_id = $rt->id;
        $data->save();

        // $rt->assignRole('rt');

        Alert::success('Sukses!', 'Berhasil menambah Data RT');

        return redirect()->back();
    }

<<<<<<< HEAD
    public function update(Request $request, $id)
    {
        $data = DataRt::where('id', $id)->firstOrFail();

        $request->validate([
            'nama' => 'required',
            'rt' => 'required',
            'periode_awal' => 'required',
            'periode_akhir' => 'required'
        ]);

        $data->nama = $request->nama;
        $data->data_rt = $request->data_rt;
        $data->periode_awal = $request->periode_awal;
        $data->periode_akhir = $request->periode_akhir;
        $data->update();

        $rt = User::where('id', $data->user_id)->update([
            'name' => $request->nama,
            'email' => 'rt' . $request->rt . '@gmail.com', 
        ]);

        Alert::success('Sukses!', 'Berhasil mengedit Data RT');

        return redirect()->route('data_rt.index');
    }

    public function destroy($id)
    {
        $data = DataRt::find($id);
        User::where('id', $data->user_id)->delete();
        $data->delete();

        Alert::success('Sukses!', 'Berhasil menghapus Data RT');

        return redirect()->route('data_rt.index');
=======
    public function edit(DataRt $dataRt)
    {
        $breadcrumb = (object) ['title' => 'Edit Data RT'];
        return view('data_rt.edit', compact('dataRt', 'breadcrumb'));
    }

    public function update(Request $request, DataRt $dataRt)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'rt' => 'required|string|max:255',
            'periode_awal' => 'required|string|max:255',
            'periode_akhir' => 'required|string|max:255',
        ]);

        // Perbarui data RT
        $dataRt->update($validatedData);

        // Redirect ke halaman index RT setelah berhasil memperbarui
        return redirect()->route('data_rt.index')->with('success', 'Data RT berhasil diperbarui');
    }

    public function destroy(DataRt $dataRt)
    {
        $breadcrumb = (object) ['title' => 'Hapus Data RT'];
        // Hapus data RT
        $dataRt->delete();

        // Redirect ke halaman index RT setelah berhasil menghapus
        return redirect()->route('data_rt.index')->with('success', 'Data RT berhasil dihapus');
>>>>>>> aa61c87e3e35ef9b6c392ce98975e432322353e1
    }
}
