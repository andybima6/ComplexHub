@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="flex justify-between mt-20">
            <div class="w-2/5 h-96 rounded-md ml-16"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
                <p class="w-911 h-62 relative left-20 top-16"
                    style="font-size: 80px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    RT :
                <div class="w-911 h-62 relative left-96 top-2"
                    style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <select class="bg-transparent  border-white outline-none text-white">
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <!-- tambahkan opsi lainnya sesuai kebutuhan -->
                    </select>
                </div>
                </p>
            </div>
            <div class="w-2/5 h-96 rounded-md relative mr-16"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
                <p class="w-911 h-62 relative left-20 top-16"
                    style="font-size: 60px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    Total Kegiatan :
                <div class="w-911 h-62 relative left-96 top-12 ml-12"
                    style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <select class="bg-transparent  border-white outline-none text-white">
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                    </select>
                </div>
                </p>
            </div>
        </div>
    </main>
@endsection
