@extends('layouts.welcome')

@section('content')
{{-- <style>
    main {
        text-align: center;
        padding: 20px;
        margin-top: 200px; /* Increased space at the top to push content further downward */
    }

    .custom-button, .lanjut-button {
        padding: 10px 20px;
        font-size: 16px;
        margin: 10px;
        cursor: pointer;
        display: inline-block;
    }

    .box {
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        width: 80%;
        max-width: 600px;
        font-size: 18px;
        box-sizing: border-box;
    }

    img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto; /* Centers the image */
    }

    @media (max-width: 600px) {
        .custom-button, .lanjut-button {
            width: calc(100% - 40px); /* Full width on small screens minus padding */
            padding: 12px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .box {
            width: 100%;
            padding: 15px;
            font-size: 16px;
        }
    }

    @media (min-width: 601px) {
        .custom-button, .lanjut-button {
            width: auto;
        }

        .box {
            width: 80%; /* Adjusted for better desktop view */
            max-width: 600px;
        }
    }
</style> --}}

<main>
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
