<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KegiatanController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
        ];
        return view ('RT.usulanKegiatanRT',['breadcrumb'=>$breadcrumb]);
        // Menentukan tampilan berdasarkan peran pengguna
        // if (Gate::allows('is-rt', $user)) {
        //     return view('RT.usulanKegiatanRT', ['breadcrumb' => $breadcrumb]);
        // } elseif (Gate::allows('is-rw', $user)) {
        //     return view('RW.usulanKegiatanRW', ['breadcrumb' => $breadcrumb]);
        // } elseif (Gate::allows('is-penduduk', $user)) {
        //     return view('Penduduk.usulanKegiatanPenduduk', ['breadcrumb' => $breadcrumb]);
        // } else {
        //     // Handle jika pengguna tidak memiliki peran yang sesuai
        //     abort(403, 'Unauthorized');
        }
    }

