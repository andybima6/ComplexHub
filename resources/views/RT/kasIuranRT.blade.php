@extends('layouts.welcome')

@section('content')
<style>
    main {
        text-align: center;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .button-container {
        display: flex;
        width: 100%;
        justify-content: left;
        margin-bottom: 20px;
        margin-left: 80px;
    }

    .buttonJudul, .lanjut-button {
        padding: 15px 30px;
        font-size: 25px;
        cursor: pointer;
        border: none;
        border-radius: 15px;
        background-color: #6f9bca;
        color: white;
        transition: all 0.3s ease;
        margin: 10px 0;
        font-family: 'Poppins', sans-serif;
    }

    .buttonJudul:hover, .lanjut-button:hover {
        background-color: #385668;
    }

    img {
        max-width: 100%;
        height: auto;
        margin: 20px 0;
    }

    .box {
        margin: 20px 0;
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: #385668;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        font-size: 18px; /* Default font size */
    }

    /* Medium devices (tablets, 768px and up) */
    @media (max-width: 768px) {
        .buttonJudul, .lanjut-button {
            padding: 12px 25px;
            font-size: 18px;
        }

        .box {
            padding: 12px;
            font-size: 16px; /* Smaller font size */
        }
    }

    /* Small devices (landscape phones, 576px and up) */
    @media (max-width: 576px) {
        .buttonJudul, .lanjut-button {
            padding: 10px 20px;
            font-size: 16px;
        }

        .box {
            padding: 10px;
            font-size: 14px; /* Smaller font size */
            max-width: 80%;
        }
    }

    /* Extra small devices (phones, less than 576px) */
    @media (max-width: 480px) {
        .buttonJudul, .lanjut-button {
            padding: 8px 15px;
            font-size: 10px;
        }

        .box {
            padding: 8px;
            font-size: 10px; /* Smaller font size */
            max-width: 80%;
        }
    }
</style>

<main>
    <img src="{{ asset('images/qr.png') }}" alt="QR Code">
    <div class="box">
        Silahkan Lakukan pembayaran pada Kode QR diatas! <br>
        Atau langsung lanjut apabila sudah melakukan pembayaran secara offline!
    </div>
    <button class="lanjut-button" onclick="window.location='{{ route('formRT') }}'">Lanjut</button>
</main>
@endsection
