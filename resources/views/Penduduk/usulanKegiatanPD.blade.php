@extends('layouts.welcome')
@section('content')
<main>
    <div class="md:justify-between mt-20 py-24 flex">
        <div class="md:w-1/4 h-96 rounded-md md:ml-48 mt-4 md:mt-0 relative"
            style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
            <p class="values w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                style="font-size: 80px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                RT :
                <div class="values w-911 h-62 relative md:left-64 top-2 text-center md:text-left"
                    style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <select class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <!-- tambahkan opsi lainnya sesuai kebutuhan -->
                    </select>
                </div>
            </p>
        </div>

        <div class="flex relative w-96 right-0 items-center justify-center mr-64"
            style="background-color: #2F80ED; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); height: 96px;">
            + Tambah
        </div>

        <div class="rounded-full absolute hidden md:flex" style="background-color: black; bottom: 32px; right: 52px;">
            wow
        </div>
    </div>
</main>
@endsection
