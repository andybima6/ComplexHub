@extends('layouts.welcome')
@section('content')

<main>
    <div style="height: 100px;"></div>
    <div class="kotakMenu" style="padding: 20px;">
        <div class="dash-content">
            <div class="overview">
                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">RT : </span>
                        <span class="number">05</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Periode : </span>
                        <span class="number">08/2024</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total : </span>
                        <span class="number">Rp. 500000</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <a href="{{ route('cekdataRT') }}"> --}}
    <div class="box4">
        <button class="button">Cek Data</button>
    </div>
  </a>
</main>
