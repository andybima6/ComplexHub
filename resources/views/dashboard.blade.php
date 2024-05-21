@extends('layouts.welcome')

@section('content')

<main>
    <div class="opsi flex flex-col md:flex-row md:justify-between mt-20">
        <div class="md:w-2/5 h-96 rounded-md md:ml-16 mt-4 md:mt-0"
            style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
            <p class="values w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                style="font-size: 60px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                Jumlah Saran :
                <div class="values w-911 h-62 relative md:left-96 top-2 text-center md:text-left"
                    style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <selected class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                        <option value="{{ count($suggestions) }}">{{ count($suggestions) }}</option>
                        {{-- <option value="02">02</option>
                        <option value="03">03</option> --}}
                    </selected>
                </div>
            </p>
        </div>
        <div class="md:w-2/5 h-96 rounded-md md:relative md:mr-16 mt-8 md:mt-0"
            style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
            <p class="w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                style="font-size: 60px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                Total UMKM :
                <div class="w-911 h-62 relative md:left-96 top-12 ml-12 text-center md:text-left"
                    style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <selected class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                        <option value="{{ count($izinUsaha) }}">{{ count($izinUsaha) }}</option>
                        {{-- <option value="02">02</option>
                        <option value="03">03</option> --}}
                    </selected>
                </div>
            </p>
        </div>
    </div>
    <div class="opsi flex flex-col md:flex-row md:justify-between mt-20">
        <div class="md:w-2/5 h-96 rounded-md md:ml-16 mt-4 md:mt-0"
            style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
            <p class="values w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                style="font-size: 60px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                Jumlah Kegiatan :
                <div class="values w-911 h-62 relative md:left-96 top-2 text-center md:text-left"
                    style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <selected class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                        <option value="{{ count($activities) }}">{{ count($activities) }}</option>
                        {{-- <option value="02">02</option>
                        <option value="03">03</option> --}}
                    </selected>
                </div>
            </p>
        </div>
        <div class="md:w-2/5 h-96 rounded-md md:relative md:mr-16 mt-8 md:mt-0"
            style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
            <p class="w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                style="font-size: 60px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                Jumlah Penduduk :
                <div class="w-911 h-62 relative md:left-96 top-12 ml-12 text-center md:text-left"
                    style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <selected class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                        <option value=""></option>
                        {{-- <option value="02">02</option>
                        <option value="03">03</option> --}}
                    </selected>
                </div>
            </p>
        </div>
    </div>
</main>
