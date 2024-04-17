<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kegiatanController;

Route::get('/welcome', function () {
    return view('layouts.welcome');
});

Route::get('/dashboard', [dashboardController::class,'index']);
// Route::get('/RT.usulanKegiatanRT', [dashboardController::class,'index']);

Route::group(['prefix' => 'usulan'], function(){
    Route::get('/RT/usulanKegiatanRT', [kegiatanController::class,'indexRT']);
});


Route::group(['prefix' => 'usulan'], function(){
    Route::get('/RW/usulanKegiatanRW', [kegiatanController::class,'indexRW']);
});

Route::group(['prefix' => 'usulan'], function(){
    Route::get('/Penduduk/usulanKegiatanPD', [kegiatanController::class,'indexPenduduk']);
=======

});
