@extends('layouts.welcome')

@section('content')
<main>
    <button class="custom-button">Input Iuran</button>
    <br><br>
    <img src="{{ asset('images/qrcode.png') }}" alt="QR Code">
    <br>
    <div class="box">
        Silahkan Lakukan pembayaran pada Kode QR diatas!
    </div>
    <button class="lanjut-button" onclick="window.location='{{ route('form') }}'">Lanjut</button>
</main>
@endsection

