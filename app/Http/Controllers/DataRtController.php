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

    return view('data_rt.index', compact('data'));
}



    public function store(Request $request)
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
    }
}
