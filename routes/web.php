<?php

use App\Http\Controllers\iuranController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\DataRtController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PenilaianController;
use App\Models\Kriteria;

Route::get('/welcome', function () {
    return view('layouts.welcome');
});

Route::get('/dashboard', [dashboardController::class, 'index']);
// Route::get('/RT.usulanKegiatanRT', [dashboardController::class,'index']);

//Data rt
// Jika views ada di dalam direktori 'data_kk'
Route::get('/data_rt', function () {
    return view('data_rt.index');
})->name('data_kk.rt.index');

Route::get('/rt', [DataController::class, 'rtPage'])->name('rt.page');
Route::get('/kk', [DataController::class, 'kkPage'])->name('kk.page');
Route::get('/warga', [DataController::class, 'wargaPage'])->name('warga.page');

Route::get('/tanggapan', [DataController::class, 'tanggapanPage'])->name('tanggapan.page');

// Activity
Route::group(['prefix' => 'usulan'], function () {
    Route::get('/RT/usulanKegiatanRT', [ActivityController::class, 'indexRT'])->name('usulanKegiatanRT');
    Route::get('/RT/detailKegiatanRT/{id}', [ActivityController::class, 'indexDetailIzinRT'])->name('detailKegiatanRT');
    Route::post('/RT/accKegiatanRT/{id}', [ActivityController::class, 'accKegiatanRT'])->name('accKegiatanRT');
    Route::post('/RT/rejectKegiatanRT/{id}', [ActivityController::class, 'rejectKegiatanRT'])->name('rejectKegiatanRT');
});



Route::group(['prefix' => 'usulan'], function () {
    Route::get('/RW/usulanKegiatanRW', [ActivityController::class, 'indexRW'])->name('usulanKegiatanRW');
    Route::get('/RW/detailKegiatanRW/{id}', [ActivityController::class, 'indexDetailIzinRW'])->name('detailKegiatanRW');
    Route::post('/Penduduk/accKegiatanRW/{id}', [ActivityController::class, 'accKegiatanRW'])->name('accKegiatanRW');
    Route::post('/Penduduk/rejectKegiatanRW/{id}', [ActivityController::class, 'rejectKegiatanRW'])->name('rejectKegiatanRW');
});

Route::group(['prefix' => 'usulan'], function () {
    Route::get('/Penduduk/usulanKegiatanPD', [ActivityController::class, 'indexPenduduk'])->name('usulanKegiatanPD');
    Route::get('/Penduduk/detailKegiatanPD/{id}', [ActivityController::class, 'indexDetailIzinPenduduk'])->name('detailKegiatanPD');
    Route::post('/Penduduk/tambahKegiatanPD', [ActivityController::class, 'storeKegiatan'])->name('tambahKegiatanPD'); //tambah
    Route::get('/Penduduk/tambahEditKegiatanPD', [ActivityController::class, 'indexTambahIzinPenduduk'])->name('tambahEditKegiatanPD'); //tampilan
    Route::post('/Penduduk/detailKegiatanPD', [ActivityController::class, 'updateKegiatan'])->name('updateKegiatan'); // update
    Route::post('/Penduduk/hapusKegiatanPD', [ActivityController::class, 'deleteKegiatan'])->name('hapusKegiatanPD');
    // dekele

    // Route::get('/Penduduk/detailKegiatanPD{id}','ActivityController@indexDetailIzinPenduduk');
});


// Saran Dan Pengaduan
Route::group(['prefix' => 'saran'], function () {
    Route::get('/RW/saranRW', [SaranController::class, 'indexRW'])->name('saranRW');
    Route::get('/RW/detailSaranRW/{id}', [SaranController::class, 'showRW'])->name('detailSaranRW');
    Route::post('/Penduduk/accSaranRW/{id}', [SaranController::class, 'accSaranRW'])->name('accSaranRW');
    Route::post('/Penduduk/rejectSaranRW/{id}', [SaranController::class, 'rejectSaranRW'])->name('rejectSaranRW');
});

Route::group(['prefix' => 'saran'], function () {
    Route::get('/RT/saranRT', [SaranController::class, 'indexRT'])->name('saranRT');
    Route::get('/RT/detailSaranRT/{id}', [SaranController::class, 'showRT'])->name('detailSaranRT');
    Route::post('/Penduduk/accSaranRT/{id}', [SaranController::class, 'accSaranRT'])->name('accSaranRT');
    Route::post('/Penduduk/rejectSaranRT/{id}', [SaranController::class, 'rejectSaranRT'])->name('rejectSaranRT');
});

Route::group(['prefix' => 'saran'], function () {
    Route::get('/Penduduk/saranPD', [SaranController::class, 'indexPD'])->name('saranPD');
    Route::get('/Penduduk/detailSaranPD/{id}', [SaranController::class, 'ShowPenduduk'])->name('detailSaranPD');
    Route::post('/Penduduk/tambahSaranPD', [SaranController::class, 'storeSaran'])->name('tambahSaranPD');
    Route::post('/Penduduk/updateSaranPD', [SaranController::class, 'updateSaranPD'])->name('updateSaranPD');
    Route::post('/Penduduk/deleteSaranPD', [SaranController::class, 'deleteSaranPD'])->name('deleteSaranPD');
});


Route::resource('rts', DataRtController::class);
// Route::resource('rts', RTController::class);

//UMKM
Route::get('/RT/izinUsahaRT', [UmkmController::class, 'indexIzinRT'])->name('izinUsahaRT');
Route::get('/RT/detailIzinUsahaRT/{id}', [UmkmController::class, 'indexDetailIzinRT'])->name('detailIzinUsahaRT');
Route::get('/RT/dataUsahaRT', [UmkmController::class, 'indexDataRT'])->name('dataUsahaRT');
Route::get('/RW/izinUsahaRW', [UmkmController::class, 'indexIzinRW'])->name('izinUsahaRW');
Route::get('/RW/dataUsahaRW', [UmkmController::class, 'indexDataRW'])->name('dataUsahaRW');
Route::get('/Penduduk/izinUsahaPenduduk', [UmkmController::class, 'showUmkm'])->name('izinUsahaPenduduk');
Route::get('/Penduduk/dataUsahaPenduduk', [UmkmController::class, 'indexDataPenduduk'])->name('dataUsahaPenduduk');
Route::get('/Penduduk/detailIzinUsaha/{id}', [UmkmController::class, 'indexDetailIzinPenduduk'])->name('detailIzinUsaha');
Route::post('/Penduduk/izinUsahaPenduduk', [UmkmController::class, 'storeIzin'])->name('storeIzin');
Route::delete('/Penduduk/izinUsahaPenduduk/{id}', [UmkmController::class, 'destroy'])->name('destroy');
Route::get('/Penduduk/izinUsahaPenduduk/{id}/edit', [UmkmController::class, 'edit'])->name('editIzinUsaha');
Route::put('/Penduduk/izinUsahaPenduduk/{id}', [UmkmController::class, 'update'])->name('updateIzin');
Route::post('/Penduduk/accIzinRT/{id}', [UmkmController::class, 'accIzinRT'])->name('accIzinRT');
Route::post('/Penduduk/accIzinRW/{id}', [UmkmController::class, 'accIzinRW'])->name('accIzinRW');
Route::post('/Penduduk/tolakIzinRW/{id}', [UmkmController::class, 'tolakIzinRW'])->name('tolakIzinRW');
Route::post('/Penduduk/tolakIzinRW/{id}', [UmkmController::class, 'tolakIzinRW'])->name('tolakIzinRW');


//  jika user belum login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);
});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk superadmin
// Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
//     Route::get('/rt', [DataRtController::class, 'index']);
// });

// untuk pegawai
// Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
//     Route::get('/pegawai', [DataPendudukController::class, 'index']);
// });


// Destinasi Wisata
Route::group(['prefix' => 'destinasi'], function () {
    Route::get('/RW/destinasiwisataRW', [DestinasiController::class, 'indexRW'])->name('RW.destinasiwisataRW');
    Route::get('/Destinasi/berandadestinasiRW', [DestinasiController::class, 'indexberanda'])->name('RW.berandadestinasiRW');
    Route::get('/Destinasi/alternatifdestinasiRW', [AlternatifController::class, 'index'])->name('Destinasi.alternatifdestinasiRW');
    Route::get('/Destinasi/kriteriadestinasiRW', [KriteriaController::class, 'index'])->name('kriteria.kriteriadestinasiRW');
    Route::get('/kriteria/create/{nama}', [KriteriaController::class, 'create'])->name('kriteria.create');

    Route::get('/Destinasi/penilaiandestinasiRW', [DestinasiController::class, 'indexpenilaian'])->name('penilaian.penilaiandestinasiRW');
    Route::get('/Destinasi/rankingdestinasiRW', [DestinasiController::class, 'indexranking'])->name('ranking.rankingdestinasiRW');
});
Route::resource('kriteria', KriteriaController::class);
Route::get('/kriteria/{nama}/create', [KriteriaController::class, 'create'])->name('kriterias.create');
Route::post('/kriteria/{nama}/kriteria', [KriteriaController::class, 'storeKriteria'])->name('kriteria.');
Route::get('/kriteria/{nama}', [KriteriaController::class, 'show'])->name('kriteria.show');

Route::resource('alternatif', AlternatifController::class);
Route::get('/alternatif/{nama wisata}/create', [AlternatifController::class, 'create'])->name('alternatifs.create');
Route::post('/alternatif/{nama wisata}/alternatif', [AlternatifController::class, 'storeAlternatif'])->name('alternatif.');
Route::get('/alternatif/{nama wisata}', [AlternatifController::class, 'show'])->name('alternatif.show');

// Iuran
Route::group(['prefix' => 'iuran'], function () {
    Route::get('/RT/kasIuranRT', [iuranController::class, 'kasindexRT'])->name('kasIuranRT');
});

Route::group(['prefix' => 'pengeluaran'], function () {
    Route::get('/RT/pengeluaranRT', [iuranController::class, 'pengeluaranindexRT'])->name('pengeluaranRT');
});


