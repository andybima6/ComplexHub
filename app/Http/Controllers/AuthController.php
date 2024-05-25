<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        // kita buat validasi pada saat tombol login diklik
        // validasinya username & password wajib diisi
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // ambil data request username & password saja
        $ambil = $request->only('email', 'password');
        //cek jika data username dan password valid (sesuai) dengan data
        if (Auth::attempt($ambil)) {
            // kalau berhasil simpan data usernya di variabel $user
            $user = Auth::user();

            // cek role user dan arahkan ke rute yang sesuai
            if ($user->role_id == 1) {
                return redirect()->intended('dashboardRT');
            } else if ($user->role_id == 2) {
                return redirect()->intended('dashboardRW');
            } else if ($user->role_id == 3) {
                return redirect()->intended('dashboardPD');
            }

            // jika belum ada role maka ke halaman /
            return redirect()->intended('/');
        }

        // jika tidak ada data user yang valid maka kembalikan lagi ke halaman login
        // pastikan kirim pesar error juga kalau login gagal yaa...
        return redirect('/')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
    }


    public function register()
    {
        // tampilkan view register
        $id = role::select('id', 'role_name')->get();
        return view('register', ['id' => $id]);
    }

    // aksi form register
    public function proses_register(Request $request)
    {
        $rt = $request->input('rt') ?? '0';
        $rw = $request->input('rw') ?? '0';
        // Buat validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Jika validasi gagal, kembali ke halaman registrasi dengan pesan error
        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        // Hash password
        $password = Hash::make($request->password);

        // Ambil ID role "penduduk"
        $pendudukRole = Role::where('role_name', 'pd')->first();

        // Buat user baru dengan role "penduduk"
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password,
            'role_id' => $pendudukRole->id, // Set role_id ke ID role "penduduk"
            'rt' => $rt,
            'rw' => $rw,
        ]);

        // Redirect ke halaman login
        return redirect()->route('login');
    }



    public function logout(Request $request)
    {
        // logout itu harus menghapus sessionnya
        $request->session()->flush();

        // jalankan juga dungsi logout pada auth
        Auth::logout();
        // kembali ke halaman login
        return Redirect('login');
    }
}
