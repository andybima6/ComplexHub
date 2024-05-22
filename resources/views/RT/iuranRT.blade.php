@extends('layouts.welcome')
@section('content')

<main>
    <div style="height: 100px;"></div>
    <div class="opsi flex flex-col md:flex-row md:justify-between mt-20">
        <div class="md:w-2/5 h-96 rounded-md md:ml-16 mt-4 md:mt-0"
            style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
            <p class="values w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                style="font-size: 80px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                RT :
            <div class="values w-911 h-62 relative md:left-96 top-2 text-center md:text-left"
                style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                <div class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                    01
                    <!-- tambahkan opsi lainnya sesuai kebutuhan -->
                </div>
            </div>
            </p>
        </div>
        <div class="md:w-2/5 h-96 rounded-md md:relative md:mr-16 mt-8 md:mt-0"
            style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
            <p class="w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                style="font-size: 60px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                Periode :
                <div class="w-911 h-62 relative md:left-96 top-12 ml-12 text-center md:text-left"
                style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                <div class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                    {{-- {{ str_pad(count($activities), 2, '0', STR_PAD_LEFT) }} --}}
                </div>
            </div>

            
            </div>
            </p>
        </div>
    </div>
    <button class="lanjut2-button" style="
    background-color: #659DBD;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    margin-left: 90%;
    margin-top: 5%;
" onclick="window.location='{{ route('dataiuranRT') }}'">Lanjut</button>
</main>
@endsection