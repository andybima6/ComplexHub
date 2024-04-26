<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\DataRtController;
use App\Http\Controllers\kegiatanController;
use App\Http\Controllers\dashboardController;

Route::get('/welcome', function () {
    return view('layouts.welcome');
});

Route::get('/dashboard', [dashboardController::class,'index']);
// Route::get('/RT.usulanKegiatanRT', [dashboardController::class,'index']);

// Data rt
// Route::get('/data_rt', [DataRtController::class, 'index'])->name('data_rt.index');
// Route::get('/data_rt/create', [DataRtController::class, 'create'])->name('data_rt.create');
// Route::post('/data_rt', [DataRtController::class, 'store'])->name('data_rt.store');
// Route::get('/data_rt/{dataRt}', [DataRtController::class, 'show'])->name('data_rt.show');
// Route::get('/data_rt/{dataRt}/edit', [DataRtController::class, 'edit'])->name('data_rt.edit');
// Route::put('/data_rt/{dataRt}', [DataRtController::class, 'update'])->name('data_rt.update');
// Route::delete('/data_rt/{dataRt}', [DataRtController::class, 'destroy'])->name('data_rt.destroy');


Route::get('/rt', [DataController::class, 'rtPage'])->name('rt.page');
Route::get('/kk', [DataController::class, 'kkPage'])->name('kk.page');
Route::get('/warga', [DataController::class, 'wargaPage'])->name('warga.page');
Route::get('/saran', [DataController::class, 'saranPage'])->name('saran.page');
Route::get('/detailSaran', [DataController::class, 'detailsaranPage'])->name('detailsaran.page');
Route::get('/tanggapan', [DataController::class, 'tanggapanPage'])->name('tanggapan.page');

Route::group(['prefix' => 'usulan'], function(){
    Route::get('/RT/usulanKegiatanRT', [kegiatanController::class,'indexRT']);
});


Route::group(['prefix' => 'usulan'], function(){
    Route::get('/RW/usulanKegiatanRW', [kegiatanController::class,'indexRW']);
});

Route::group(['prefix' => 'usulan'], function(){
    Route::get('/Penduduk/usulanKegiatanPD', [kegiatanController::class,'indexPenduduk']);


});

//UMKM
Route::get('/RT/izinUsahaRT', [UmkmController::class, 'indexIzinRT'])->name('izinUsahaRT'); 
Route::get('/RT/dataUsahaRT', [UmkmController::class, 'indexDataRT'])->name('dataUsahaRT'); 
Route::get('/RW/izinUsahaRW', [UmkmController::class, 'indexIzinRW'])->name('izinUsahaRW'); 
Route::get('/RW/dataUsahaRW', [UmkmController::class, 'indexDataRW'])->name('dataUsahaRW');
Route::get('/Penduduk/izinUsahaPenduduk', [UmkmController::class, 'indexIzinPenduduk'])->name('izinUsahaPenduduk');
Route::get('/Penduduk/dataUsahaPenduduk', [UmkmController::class, 'indexDataPenduduk'])->name( 'dataUsahaPenduduk' );
Route::get('/Penduduk/detailIzinUsaha', [UmkmController::class, 'indexDetailIzinPenduduk'])->name( 'detailIzinUsaha' );