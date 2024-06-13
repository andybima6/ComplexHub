<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RTController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\SAWController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\DataRtController;
use App\Http\Controllers\IuranRTController;
use App\Http\Controllers\IuranRWController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\MetodeDuaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\IuranWargaController;

use App\Http\Controllers\LandingPageController;
// use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\DataKartuKeluargaController;
// use App\Http\Controllers\DataRtController;
// use App\Http\Controllers\MetodeDuaController;
// use App\Http\Controllers\IuranRTController;
// use App\Http\Controllers\IuranRWController;
// use App\Http\Controllers\IuranwargaController;

// use App\Http\Controllers\IuranWargaController;

// use App\Http\Controllers\DataPendudukController;
// use App\Http\Controllers\SAWController;

Route::get('/welcome', function () {
    return view('layouts.welcome');
});

// Route::get('/login', function () {
//     return view('login');
// });



Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute yang hanya bisa diakses oleh RT
Route::group(['middleware' => ['auth', 'role_id:1']], function () {
    Route::get('/rt', function () {

        return view('RT.dashboardRT');

    });
    Route::get('/RT/saranRT', [SaranController::class, 'indexRT'])->name('saranRT');
    Route::get('/RT/detailSaranRT/{id}', [SaranController::class, 'showRT'])->name('detailSaranRT');
    Route::post('/Penduduk/accSaranRT/{id}', [SaranController::class, 'accSaranRT'])->name('accSaranRT');
    Route::post('/Penduduk/rejectSaranRT/{id}', [SaranController::class, 'rejectSaranRT'])->name('rejectSaranRT');
    Route::get('/RT/usulanKegiatanRT', [ActivityController::class, 'indexRT'])->name('usulanKegiatanRT');
    Route::get('/RT/detailKegiatanRT/{id}', [ActivityController::class, 'indexDetailIzinRT'])->name('detailKegiatanRT');
    Route::post('/RT/accKegiatanRT/{id}', [ActivityController::class, 'accKegiatanRT'])->name('accKegiatanRT');
    Route::post('/RT/rejectKegiatanRT/{id}', [ActivityController::class, 'rejectKegiatanRT'])->name('rejectKegiatanRT');
});

// Rute yang hanya bisa diakses oleh RW
Route::group(['middleware' => ['auth', 'role_id:2']], function () {
    Route::get('/rw', function () {
        return view('RW.dashboardRW');
    });

});

// Rute yang hanya bisa diakses oleh PD
Route::group(['middleware' => ['auth', 'role_id:3']], function () {
    Route::get('/pd', function () {
        return view('Penduduk.dashboardPD');
    });
});


// use App\Http\Middleware\RoleMiddleware;

Route::middleware(['auth'])->group(function () {
    // Rute yang dapat diakses oleh semua pengguna yang telah terautentikasi

    Route::middleware(RoleMiddleware::class . ':1')->group(function () {
        Route::get('/RT/saranRT', [SaranController::class, 'indexRT'])->name('saranRT');
        Route::get('/RT/detailSaranRT/{id}', [SaranController::class, 'showRT'])->name('detailSaranRT');
        Route::post('/Penduduk/accSaranRT/{id}', [SaranController::class, 'accSaranRT'])->name('accSaranRT');
        Route::post('/Penduduk/rejectSaranRT/{id}', [SaranController::class, 'rejectSaranRT'])->name('rejectSaranRT');
        Route::get('/RT/usulanKegiatanRT', [ActivityController::class, 'indexRT'])->name('usulanKegiatanRT');
        Route::get('/RT/detailKegiatanRT/{id}', [ActivityController::class, 'indexDetailIzinRT'])->name('detailKegiatanRT');
        Route::post('/RT/accKegiatanRT/{id}', [ActivityController::class, 'accKegiatanRT'])->name('accKegiatanRT');
        Route::post('/RT/rejectKegiatanRT/{id}', [ActivityController::class, 'rejectKegiatanRT'])->name('rejectKegiatanRT');

        Route::get('/RT/kasIuranRT', [IuranRTController::class, 'dataiuranRT'])->name('kasIuranRT');
        Route::get('/RT/form', [IuranRTController::class, 'form'])->name('formRT');
        Route::post('/RT/store', [IuranRTController::class, 'store'])->name('storeRT');
        Route::get('/RT/historyRT', [IuranRTController::class, 'historyRT'])->name('historyRT');
        Route::post('/RT/accIuranRT/{id}', [IuranRTController::class, 'accIuranRT'])->name('accIuranRT');
        Route::post('/RT/tolakIuranRT/{id}', [IuranRTController::class, 'tolakIuranRT'])->name('tolakIuranRT');
        Route::get('/RT/historyRT/search', [IuranRTController::class, 'filter'])->name('historyRT.search');
        Route::get('/RT/{id}/edit', [IuranRTController::class, 'edit'])->name('edit');
        Route::put('/RT/{id}', [IuranRTController::class, 'update'])->name('updateIuran');
        Route::delete('/RT/{id}', [IuranRTController::class, 'destroy'])->name('destroy');


        // Route::get('/RT/pengeluaranRT', [IuranController::class, 'pengeluaranindexRT'])->name('pengeluaranRT');
        // Route::get('/RT/iuranRT', [IuranController::class, 'dataiuranRT'])->name('dataiuranRT');

        Route::get('dashboardRT', [DashboardController::class, 'indexRT'])->name('dashboardRT');
        Route::get('/get-chart-data-rt', [DashboardController::class, 'getChartDataRT']);
        // routes/web.php or routes/api.php
        Route::middleware('auth')->get('/get-iuran-data-rt', [DashboardController::class, 'getIuranDataRT']);


    });

    Route::middleware(RoleMiddleware::class . ':2')->group(function () {
        Route::get('dashboardRW', [DashboardController::class, 'indexRW'])->name('dashboardRW');

        Route::get('/RW/usulanKegiatanRW', [ActivityController::class, 'indexRW'])->name('usulanKegiatanRW');
        Route::get('/RW/detailKegiatanRW/{id}', [ActivityController::class, 'indexDetailIzinRW'])->name('detailKegiatanRW');
        Route::post('/Penduduk/accKegiatanRW/{id}', [ActivityController::class, 'accKegiatanRW'])->name('accKegiatanRW');
        Route::post('/Penduduk/rejectKegiatanRW/{id}', [ActivityController::class, 'rejectKegiatanRW'])->name('rejectKegiatanRW');

        Route::get('/RW/saranRW', [SaranController::class, 'indexRW'])->name('saranRW');
        Route::get('/RW/detailSaranRW/{id}', [SaranController::class, 'showRW'])->name('detailSaranRW');
        Route::post('/Penduduk/accSaranRW/{id}', [SaranController::class, 'accSaranRW'])->name('accSaranRW');
        Route::post('/Penduduk/rejectSaranRW/{id}', [SaranController::class, 'rejectSaranRW'])->name('rejectSaranRW');

        Route::get('/RW/izinUsahaRW', [UmkmController::class, 'indexIzinRW'])->name('izinUsahaRW');
        Route::get('/RW/dataUsahaRW', [UmkmController::class, 'indexDataRW'])->name('dataUsahaRW');
        Route::post('/Penduduk/accIzinRW/{id}', [UmkmController::class, 'accIzinRW'])->name('accIzinRW');
        Route::post('/Penduduk/tolakIzinRW/{id}', [UmkmController::class, 'tolakIzinRW'])->name('tolakIzinRW');
        Route::post('/Penduduk/tolakIzinRW/{id}', [UmkmController::class, 'tolakIzinRW'])->name('tolakIzinRW');

        Route::get('/RW/iuranRW', [IuranRWController::class, 'dataiuranRW'])->name('dataiuranRW');
        Route::get('/RW/form', [IuranRWController::class, 'form'])->name('formRW');
        Route::post('/RW/store', [IuranWargaController::class, 'store'])->name('storeRW');
        Route::get('/RW/historyRW', [IuranRWController::class, 'historyRW'])->name('historyRW');
        Route::get('/RW/historyRW/search', [IuranRWController::class, 'search'])->name('historyRW.search');
        Route::get('/RW/cari', [IuranRWController::class, 'cari'])->name('cari');
        Route::get('/RW/{id}/ubah', [IuranRWController::class, 'ubah'])->name('ubah');
        Route::put('/RW/{id}', [IuranRWController::class, 'perbarui'])->name('perbarui');
        Route::delete('/RW/{id}', [IuranRWController::class, 'hapus'])->name('hapus');



        Route::get('/metode_dua_spk/alternatifdestinasi2', [MetodeDuaController::class, 'indexAlternatif'])->name('alternatif');
        Route::get('/metode_dua_spk/kriteriadestinasi2', [MetodeDuaController::class, 'indexKriteria'])->name('kriteria');
        Route::get('/metode_dua_spk/penilaiandestinasi2', [MetodeDuaController::class, 'indexPenilaian'])->name('penilaian');
        Route::get('/metode_dua_spk/rankingdestinasi2', [MetodeDuaController::class, 'indexRanking'])->name('ranking');


        Route::get('criterias/{id}/edit', [MetodeDuaController::class, 'edit'])->name('criterias.edit');
        Route::put('criterias/{id}', [MetodeDuaController::class, 'updatekriteria'])->name('criterias.updatekriteria');


        Route::get('alternatives/{id}/edit', [MetodeDuaController::class, 'editAlternative'])->name('alternatives.edit');
        Route::put('alternatives/{id}', [MetodeDuaController::class, 'updateAlternative'])->name('alternatives.update');

        Route::get('penilaians/{id}/edit', [MetodeDuaController::class, 'editPenilaian'])->name('penilaian.edit');
        Route::put('penilaians/{id}', [MetodeDuaController::class, 'updatePenilaian'])->name('penilaian.update');

        Route::get('/ranking', [MetodeDuaController::class, 'indexRanking'])->name('ranking');

        Route::get('dashboardRW', [DashboardController::class, 'indexRW'])->name('dashboardRW');
        Route::get('/get-chart-data-rw', [DashboardController::class, 'getChartDataRW']);

        Route::get('/get-iuran-data-rw', [DashboardController::class, 'getIuranDataRW']);
    });

    Route::middleware(RoleMiddleware::class . ':3')->group(function () {
        Route::get('/Penduduk/usulanKegiatanPD', [ActivityController::class, 'indexPenduduk'])->name('usulanKegiatanPD');
        Route::get('/Penduduk/detailKegiatanPD/{id}', [ActivityController::class, 'indexDetailIzinPenduduk'])->name('detailKegiatanPD');
        Route::post('/Penduduk/tambahKegiatanPD', [ActivityController::class, 'storeKegiatan'])->name('tambahKegiatanPD'); //tambah
        Route::get('/Penduduk/tambahEditKegiatanPD', [ActivityController::class, 'indexTambahIzinPenduduk'])->name('tambahEditKegiatanPD'); //tampilan
        Route::post('/Penduduk/detailKegiatanPD', [ActivityController::class, 'updateKegiatan'])->name('updateKegiatan'); // update
        Route::post('/Penduduk/hapusKegiatanPD', [ActivityController::class, 'deleteKegiatan'])->name('hapusKegiatanPD');

        Route::get('/Penduduk/saranPD', [SaranController::class, 'indexPD'])->name('saranPD');
        Route::get('/Penduduk/detailSaranPD/{id}', [SaranController::class, 'ShowPenduduk'])->name('detailSaranPD');
        Route::post('/Penduduk/tambahSaranPD', [SaranController::class, 'storeSaran'])->name('tambahSaranPD');
        Route::post('/Penduduk/updateSaranPD', [SaranController::class, 'updateSaranPD'])->name('updateSaranPD');
        Route::post('/Penduduk/deleteSaranPD', [SaranController::class, 'deleteSaranPD'])->name('deleteSaranPD');

        Route::get('/Penduduk/izinUsahaPenduduk', [UmkmController::class, 'indexIzinPenduduk'])->name('izinUsahaPenduduk');
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

        Route::get('/warga/iuran', [IuranWargaController::class, 'index'])->name('index');
        Route::get('/warga/form', [IuranWargaController::class, 'form'])->name('form');
        Route::post('/warga/store', [IuranWargaController::class, 'store'])->name('store');
        Route::get('/warga/history', [IuranWargaController::class, 'history'])->name('history');

        Route::get('dashboardPD', [DashboardController::class, 'indexPD'])->name('dashboardPD');
        Route::get('/get-chart-data', [DashboardController::class, 'getChartDataPD']);

       // routes/web.php or routes/api.php
Route::middleware('auth')->get('/get-iuran-data-pd', [DashboardController::class, 'getIuranDataPD']);


    });

    // Rute lainnya...
});
Route::get('/', [LandingPageController::class, 'index']);


//Data rt
// // Jika views ada di dalam direktori 'data_kk'
// Route::get('/data_rt', function () {
//     return view('data_rt.index');
// })->name('data_kk.rt.index');

//pendataan
Route::resource('rts', RTController::class);
Route::resource('rws', RWController::class);

Route::resource('data_kartu_keluargas', DataKartuKeluargaController::class);
Route::get('/data_kartu_keluargas/{dataKartuKeluarga}/anggota_keluargas/create', [DataKartuKeluargaController::class, 'createAnggota'])->name('data_kartu_keluargas.create_anggota');
Route::post('/data_kartu_keluargas/{dataKartuKeluarga}/anggota_keluargas', [DataKartuKeluargaController::class, 'storeAnggota'])->name('data_kartu_keluargas.store_anggota');
Route::get('/data_kartu_keluargas/{dataKartuKeluarga}', [DataKartuKeluargaController::class, 'show'])->name('data_kartu_keluargas.show');
Route::post('/data_kartu_keluargas', [DataKartuKeluargaController::class, 'store'])->name('data_kartu_keluargas.store');
Route::get('/data-kartu-keluargas/search', [DataKartuKeluargaController::class, 'search'])->name('data_kartu_keluargas.search');

Route::post('/data_kartu_keluargas/{dataKartuKeluarga}/anggotaKeluarga', [AnggotaKeluargaController::class, 'storeAnggota'])->name('anggota_keluargas.store');

Route::get('/anggota_keluargas/create/{dataKartuKeluarga}', [AnggotaKeluargaController::class, 'create'])->name('createAnggota');
Route::post('/anggota_keluargas/store/{dataKartuKeluarga}', [AnggotaKeluargaController::class, 'store'])->name('storeAnggota');
Route::get('/anggota_keluargas/edit/{dataKartuKeluarga}/{anggotaKeluarga}', [AnggotaKeluargaController::class, 'edit'])->name('editAnggota');
Route::put('/anggota_keluargas/update/{dataKartuKeluarga}/{anggotaKeluarga}', [AnggotaKeluargaController::class, 'update'])->name('updateAnggota');
Route::delete('/anggota_keluargas/destroy/{dataKartuKeluarga}/{anggotaKeluarga}', [AnggotaKeluargaController::class, 'destroy'])->name('destroyAnggota');
Route::post('/anggota_keluargas', [AnggotaKeluargaController::class, 'store'])->name('store_anggota_keluarga');



// Route::get('/rt', [DataController::class, 'rtPage'])->name('rt.page');
// Route::get('/rw', [DataController::class, 'rwPage'])->name('rw.page');
// Route::get('/pd', [DataController::class, 'pdPage'])->name('pd.page');
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


//UMKM
Route::get('/RT/izinUsahaRT', [UmkmController::class, 'indexIzinRT'])->name('izinUsahaRT');
Route::get('/RT/detailIzinUsahaRT/{id}', [UmkmController::class, 'indexDetailIzinRT'])->name('detailIzinUsahaRT');
Route::get('/RW/detailIzinUsahaRW/{id}', [UmkmController::class, 'indexDetailIzinRW'])->name('detailIzinUsahaRW');
Route::get('/RT/dataUsahaRT', [UmkmController::class, 'indexDataRT'])->name('dataUsahaRT');
Route::get('/RW/izinUsahaRW', [UmkmController::class, 'indexIzinRW'])->name('izinUsahaRW');
Route::get('/RW/dataUsahaRW', [UmkmController::class, 'indexDataRW'])->name('dataUsahaRW');
Route::get('/Penduduk/izinUsahaPenduduk', [UmkmController::class, 'indexIzinPenduduk'])->name('izinUsahaPenduduk');
Route::get('/Penduduk/dataUsahaPenduduk', [UmkmController::class, 'indexDataPenduduk'])->name('dataUsahaPenduduk');
Route::get('/Penduduk/detailIzinUsaha/{id}', [UmkmController::class, 'indexDetailIzinPenduduk'])->name('detailIzinUsaha');
Route::post('/Penduduk/izinUsahaPenduduk', [UmkmController::class, 'storeIzin'])->name('storeIzin');
Route::delete('/Penduduk/izinUsahaPenduduk/{id}', [UmkmController::class, 'destroy'])->name('destroy');
Route::get('/Penduduk/izinUsahaPenduduk/{id}/edit', [UmkmController::class, 'edit'])->name('editIzinUsaha');
Route::put('/Penduduk/izinUsahaPenduduk/{id}', [UmkmController::class, 'update'])->name('updateIzin');
Route::post('/Penduduk/accIzinRT/{id}', [UmkmController::class, 'accIzinRT'])->name('accIzinRT');
Route::post('/Penduduk/accIzinRW/{id}', [UmkmController::class, 'accIzinRW'])->name('accIzinRW');
Route::post('/Penduduk/tolakIzinRT/{id}', [UmkmController::class, 'tolakIzinRT'])->name('tolakIzinRT');
Route::post('/Penduduk/tolakIzinRW/{id}', [UmkmController::class, 'tolakIzinRW'])->name('tolakIzinRW');

//


// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/rt', [DataRtController::class, 'index']);
});

// untuk pegawai
// Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
//     Route::get('/pegawai', [DataPendudukController::class, 'index']);
// });


// Destinasi Wisata
Route::group(['prefix' => 'destinasi'], function () {
    Route::get('/RW/destinasiwisataRW', [DestinasiController::class, 'indexRW'])->name('RW.destinasiwisataRW');
    Route::get('/Destinasi/berandadestinasiRW', [DestinasiController::class, 'indexberanda'])->name('RW.berandadestinasiRW');
    Route::get('/Destinasi/alternatifdestinasiRW', [AlternatifController::class, 'index'])->name('alternatif.index');

    Route::get('/Destinasi/kriteriadestinasiRW', [KriteriaController::class, 'index'])->name('kriteria.kriteriadestinasiRW');
    Route::get('/kriteria/create/{nama}', [KriteriaController::class, 'create'])->name('kriteria.create');

    Route::get('/Destinasi/penilaiandestinasiRW', [PenilaianController::class, 'indexpenilaian'])->name('penilaian.penilaiandestinasiRW');
    Route::get('/Destinasi/rankingdestinasiRW', [DestinasiController::class, 'indexranking'])->name('ranking.rankingdestinasiRW');
});
// Route::resource('kriteria', KriteriaController::class);
// Route::get('/kriteria/{nama}/create', [KriteriaController::class, 'create'])->name('kriterias.create');
// Route::post('/kriteria/{nama}/kriteria', [KriteriaController::class, 'storeKriteria'])->name('kriteria.');
// Route::get('/kriteria/{nama}', [KriteriaController::class, 'show'])->name('kriteria.show');

// Route::resource('alternatif', AlternatifController::class);
// Route::get('/alternatif/{nama wisata}/create', [AlternatifController::class, 'create'])->name('alternatifs.create');
// Route::post('/alternatif/{nama wisata}/alternatif', [AlternatifController::class, 'storeAlternatif'])->name('alternatif.');
// Route::get('/alternatif/{nama wisata}', [AlternatifController::class, 'show'])->name('alternatif.show');

//Route::get('/saw', [SAWController::class, 'index']);

//spk SAW revisi
Route::get('kriteria', [KriteriaController::class, 'index'])->name('kriteria.kriteriadestinasiRW');
Route::put('/kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
Route::resource('kriteria', KriteriaController::class);

Route::resource('alternatif', AlternatifController::class);
Route::put('/alternatif/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');

Route::resource('penilaian', PenilaianController::class);
Route::put('/penilaian/{alternatif}', [PenilaianController::class, 'update'])->name('penilaian.update');

Route::get('/saw', [SAWController::class, 'calculateSAW']);
// Route::put('/kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');

// Iuran
// Route::group(['prefix' => 'iuran'], function () {
//     Route::get('/RT/kasIuranRT', [iuranController::class, 'kasindexRT'])->name('kasIuranRT');
// });

// Route::group(['prefix' => 'pengeluaran'], function () {
//     Route::get('/RT/pengeluaranRT', [iuranController::class, 'pengeluaranindexRT'])->name('pengeluaranRT');
// });

// Route::group(['prefix' => 'warga'], function () {
//     // Route::get('/warga/iuran', [iuranController::class, 'pengeluaranindexRT'])->name('pengeluaranRT');
//     Route::get('/warga/iuran/', [IuranWargaController::class, 'index'])->name('pengeluaranWarga');
//     Route::get('/warga/form', [IuranWargaController::class, 'form'])->name('wargaForm');
//     Route::post('/warga/form', [IuranController::class, 'storeIuran'])->name('storeIuran');
//     Route::get('/warga/history', [IuranWargaController::class, 'history'])->name('wargaHistory');
//     Route::post('/warga/iuran/store', [IuranController::class, 'storeIuran'])->name('store');
//     Route::get('/RT/iuranRT', [IuranController::class, 'dataiuranRT'])->name('dataiuranRT');
//     Route::get('/RW/iuranRW', [IuranController::class, 'dataiuranRW'])->name('dataiuranRW');


//     Route::get('/warga/iuran/', [iuranController::class, 'pengeluaranindexWarga'])->name('pengeluaranWarga');
//     Route::get('/warga/form', [iuranController::class, 'formWarga'])->name('wargaForm');
// });
