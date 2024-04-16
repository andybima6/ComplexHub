@extends('layouts.welcome')
@section('content')
<main>
    <div class="md:justify-between mt-20 py-24 flex">
        <div class="md:ml-52 mt-4 md:mt-0 relative"
            style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); width:350px;height:275px;border-radius:13px">
            <p class="relative md:right-24 top-6 text-center md:text-left;"
                style="font-size: 45px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                RT :
            <div class="values w-911 h-62 relative md:left-32 top-2 text-center md:text-left"
                style="font-size: 120px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                <select class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <!-- tambahkan opsi lainnya sesuai kebutuhan -->
                </select>
            </div>
            </p>
        </div>

        <div class="flex relative w-96 top-24 right-0 items-center justify-center mr-64"
            style="background-color: #2F80ED; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); height: 96px;">
           <p style="font-size: 24px; color: white; font-family: 'Poppins', sans-serif; font-weight: 300;">
            + Tambah
           </p>
        </div>
        <div class="bgusulan relative" style="position: absolute; top: 40%; left: 12%; z-index: 0;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); border-radius: 36px; opacity: 0.4;"></div>
            <img src="{{ asset('img/background.png') }}" class="justify-center items-center m-0 mr-64"
                style="overflow: scroll; height: 950px; border-radius: 16px; width: 100%; margin-bottom: 0px;">
            </img>
            <p class="flex justify-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 24px; color: white; font-family: 'Poppins', sans-serif; font-weight: 300; width: 80%; max-width: 2000px;">
                Pengajuan kegiatan oleh penduduk di tingkat RW dan RT dapat mengoptimalkan partisipasi penduduk dalam pembangunan lingkungan serta mempercepat respons dan koordinasi dari pihak berwenang.
            </p>
        </div>



</main>
@endsection
