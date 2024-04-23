<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kegiatanController;
use App\Http\Controllers\UmkmController;

Route::get('/welcome', function () {
    return view('layouts.welcome');
});

Route::get('/daftar-kegiatan', [KegiatanController::class, 'index'])->name('daftar-kegiatan');
Route::get('/dashboard', [dashboardController::class,'index']);
Route::get('/RT.usulanKegiatanRT', [dashboardController::class,'index']);
Route::get('/RT/izinUsahaRT', [UmkmController::class, 'indexIzinRT'])->name('izinUsahaRT'); 
Route::get('/RT/dataUsahaRT', [UmkmController::class, 'indexDataRT'])->name('dataUsahaRT'); 
Route::get('/RW/izinUsahaRW', [UmkmController::class, 'indexIzinRW'])->name('izinUsahaRW'); 
Route::get('/RW/dataUsahaRW', [UmkmController::class, 'indexDataRW'])->name('dataUsahaRW');
Route::get('/Penduduk/izinUsahaPenduduk', [UmkmController::class, 'indexIzinPenduduk'])->name('izinUsahaPenduduk');
Route::get('/Penduduk/dataUsahaPenduduk', [UmkmController::class, 'indexDataPenduduk'])->name( 'dataUsahaPenduduk' );
Route::get('/Penduduk/detailIzinUsaha', [UmkmController::class, 'indexDetailIzinPenduduk'])->name( 'detailIzinUsaha' );