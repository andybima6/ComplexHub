@extends('layouts.welcome')

@section('content')
{{-- <style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    main {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 20px;
    }

    .custom-button, .lanjut-button {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    .box {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        max-width: 300px;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    /* Mobile view */
    @media (max-width: 767px) {
        main {
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .custom-button, .lanjut-button {
            flex: 1 1 100%;
            font-size: 14px;
        }

        .box {
            flex: 1 1 100%;
            max-width: none;
        }
    }
</style> --}}

<style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    main {
        display: flex;
        flex-direction: column;
        /* align-items: center; */
        /* text-align: center; */
        gap: 20px;
    }

    .custom-button, .lanjut-button {
        padding: 10px 20px;
        font-size: 20px;
        cursor: pointer;
    }

    .box {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        max-width: 300px;
        display: flex;
        justify-content: center;
        text-align: center;
    }

    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    .custom-button {
        width: 300px;
        height: 80px;
        font-size: 25px;
    }

    /* Mobile view */
    @media (max-width: 480px) {
        main {
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 10px;
            text-align: center;
        }

        .custom-button, .lanjut-button {
            flex: 1 1 100%;
            font-size: 14px;
            text-align: center;
        }

        .box {
            flex: 1 1 100%;
            max-width: none;
            text-align: center;
        }

        img {
            flex: 1 1 100%;
            text-align: center;
        }
    }

    .lanjut-button {
        display: flex;
        justify-content: center;
    }
</style>

<main class="contain-responsive">
    <button class="custom-button">Input Iuran</button>
    <br><br>
    <img src="{{ asset('images/qrcode.png') }}" alt="QR Code">
    <br>
    <div class="box">
        Silahkan Lakukan pembayaran pada Kode QR diatas!
    </div>
    <button class="lanjut-button" onclick="window.location='{{ route('wargaForm') }}'">Lanjut</button>
</main>
@endsection
