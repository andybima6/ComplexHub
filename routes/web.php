<?php

use App\Http\Controllers\iuranController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\DataRtController;
use App\Http\Controllers\kegiatanController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\RedirectController;

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
Route::get('/detailSaran/tanggapan', [DataController::class, 'tanggapanPage'])->name('tanggapan.page');

// Kegiatan
Route::group(['prefix' => 'usulan'], function(){
    Route::get('/RT/usulanKegiatanRT', [kegiatanController::class,'indexRT'])->name( 'usulanKegiatanRT' );
    Route::get('/RT/detailKegiatanRT', [kegiatanController::class, 'indexDetailIzinRT'])->name( 'detailKegiatanRT' );

});


Route::group(['prefix' => 'usulan'], function(){
    Route::get('/RW/usulanKegiatanRW', [kegiatanController::class,'indexRW'])->name( 'usulanKegiatanRW' );
    Route::get('/RW/detailKegiatanRW', [kegiatanController::class, 'indexDetailIzinRW'])->name( 'detailKegiatanRW' );
});

Route::group(['prefix' => 'usulan'], function(){
    Route::get('/Penduduk/usulanKegiatanPD', [kegiatanController::class,'indexPenduduk'])->name('usulanKegiatanPD');
    Route::get('/Penduduk/detailKegiatanPD', [kegiatanController::class, 'indexDetailIzinPenduduk'])->name('detailKegiatanPD');
    Route::get('/Penduduk/tambahKegiatanPD', [kegiatanController::class, 'indexTambahIzinPenduduk'])->name('tambahKegiatanPD');
});


//UMKM
Route::get('/RT/izinUsahaRT', [UmkmController::class, 'indexIzinRT'])->name('izinUsahaRT');
Route::get('/RT/dataUsahaRT', [UmkmController::class, 'indexDataRT'])->name('dataUsahaRT');
Route::get('/RW/izinUsahaRW', [UmkmController::class, 'indexIzinRW'])->name('izinUsahaRW');
Route::get('/RW/dataUsahaRW', [UmkmController::class, 'indexDataRW'])->name('dataUsahaRW');
Route::get('/Penduduk/izinUsahaPenduduk', [UmkmController::class, 'indexIzinPenduduk'])->name('izinUsahaPenduduk');
Route::get('/Penduduk/dataUsahaPenduduk', [UmkmController::class, 'indexDataPenduduk'])->name( 'dataUsahaPenduduk' );
Route::get('/Penduduk/detailIzinUsaha', [UmkmController::class, 'indexDetailIzinPenduduk'])->name( 'detailIzinUsaha' );


//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/rt', [DataRtController::class, 'index']);
});

// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/pegawai', [DataPendudukController::class, 'index']);

});

Route::group(['prefix' => 'iuran'], function () {
    Route::get('/RT/kasIuranRT', [iuranController::class, 'kasindexRT'])->name('kasIuranRT');

});


Route::group(['prefix' => 'pengeluaran'], function () {
    Route::get('/RT/pengeluaranRT', [iuranController::class, 'pengeluaranindexRT'])->name('pengeluaranRT');

});