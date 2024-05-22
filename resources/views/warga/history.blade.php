@extends('layouts.welcome')

@section('content')
<main>
    <button class="custom-button">History Iuran</button>
    <br><br>
    <div class="form-container">
        <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 5px;">
            <label for="rt" style="flex: 1; font-weight: bold; margin: 0; padding-right: 5px;">RT</label>
            <p id="rt" style="flex: 8; margin: 0;">: 001</p>
        </div>
        
        <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 5px;">
            <label for="nama" style="flex: 1; font-weight: bold; margin: 0; padding-right: 5px;">Nama</label>
            <p id="nama" style="flex: 8; margin: 0;">: John Doe</p>
        </div>

        <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 5px;">
            <label for="periode" style="flex: 1; font-weight: bold; margin: 0; padding-right: 5px;">Periode</label>
            <p id="periode" style="flex: 8; margin: 0;">: Januari 2024</p>
        </div>

        <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 5px;">
            <label for="total" style="flex: 1; font-weight: bold; margin: 0; padding-right: 5px;">Total</label>
            <p id="total" style="flex: 8; margin: 0;">: Rp 100.000</p>
        </div>

        <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 5px;">
            <label for="total" style="flex: 1; font-weight: bold; margin: 0; padding-right: 5px;">Bukti</label>
            <p id="total" style="flex: 8; margin: 0;">: 
            {{-- <img src="{{ asset('storage/' . $iuran->bukti) }}" alt=""> --}}
            </p>
        </div>  

        <div class="form-group-row" style="display: flex; align-items: center; margin-bottom: 5px;">
            <label for="keterangan" style="flex: 1; font-weight: bold; margin: 0; padding-right: 5px;">Keterangan</label>
            <div id="keterangan" style="flex: 8; margin: 0;">
                : <button class="btn-primary" style="background-color: #007bff; color: white; padding: 5px 10px; border: none; border-radius: 5px;">Diterima</button>
            </div>
        </div>
    </div>
</main>
@endsection
