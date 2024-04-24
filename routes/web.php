<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kegiatanController;
use App\Http\Controllers\DataRtController;
use App\Http\Controllers\DataController;

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


Route::group(['prefix' => 'usulan'], function(){
    Route::get('/RT/usulanKegiatanRT', [kegiatanController::class,'indexRT']);
});


Route::group(['prefix' => 'usulan'], function(){
    Route::get('/RW/usulanKegiatanRW', [kegiatanController::class,'indexRW']);
});

Route::group(['prefix' => 'usulan'], function(){
    Route::get('/Penduduk/usulanKegiatanPD', [kegiatanController::class,'indexPenduduk']);


});
