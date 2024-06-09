<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RT;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Ambil data request email & password
        $ambil = $request->only('email', 'password');

        // Cek jika data email dan password valid
        if (Auth::attempt($ambil)) {
            // Jika berhasil simpan data user di variabel $user
            $user = Auth::user();

            // Cek role user dan arahkan ke rute yang sesuai
            if ($user->role_id == 1) {
                return redirect()->intended('dashboardRT');
            } else if ($user->role_id == 2) {
                return redirect()->intended('dashboardRW');
            } else if ($user->role_id == 3) {
                return redirect()->intended('dashboardPD');
            }

            // Jika belum ada role maka ke halaman /
            return redirect()->intended('/');
        }

        // Jika tidak ada data user yang valid maka kembalikan lagi ke halaman login
        return redirect('/')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
    }

    public function register()
    {
        // Tampilkan view register
        $roles = Role::select('id', 'role_name')->get();
        $rts = RT::all(); // Add this line to get all RT
        return view('register', ['roles' => $roles, 'rts' => $rts]);
    }

    // Aksi form register
    public function proses_register(Request $request)
    {
        $rt_id = $request->input('rt_id') ?? '0'; // Ambil nilai rt_id dari request atau default ke '0'

        // Buat validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'rt_id' => 'required|integer|exists:rts,id', // Validasi rt_id
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
            'rt_id' => $rt_id,
            'rw' => 0, // Set rw ke 0
        ]);

        // Redirect ke halaman login
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        // Logout harus menghapus session
        $request->session()->flush();

        // Jalankan juga fungsi logout pada auth
        Auth::logout();

        // Kembali ke halaman login
        return Redirect('login');
    }
}
