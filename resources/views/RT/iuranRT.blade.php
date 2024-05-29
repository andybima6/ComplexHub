@extends('layouts.welcome')
@section('content')

<main class="contain-responsive p-4">
    <div style="height: 100px;"></div>
    <div class="opsi flex flex-col md:flex-row md:justify-between mt-20">
        <div class="md:w-2/5 h-96 rounded-md md:ml-16 mt-4 md:mt-0 bg-blue-500 shadow-lg flex items-center justify-center">
            <div class="text-center md:text-left">
                <p class="text-5xl md:text-7xl font-bold text-white">RT :</p>
                <p class="text-6xl md:text-8xl font-bold text-white mt-2 md:mt-4">01</p>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </div>
        </div>
        <div class="md:w-2/5 h-96 rounded-md md:mr-16 mt-8 md:mt-0 bg-blue-500 shadow-lg flex items-center justify-center">
            <div class="text-center md:text-left">
                <p class="text-4xl md:text-6xl font-bold text-white">Periode :</p>
                <p class="text-6xl md:text-8xl font-bold text-white mt-2 md:mt-4">
                    {{-- {{ str_pad(count($activities), 2, '0', STR_PAD_LEFT) }} --}}
                </p>
            </div>
        </div>
    </div>
    <div class="flex justify-end mt-8">
        <button class="lanjut2-button bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600 transition duration-300"
            onclick="window.location='{{ route('dataiuranRT') }}'">Lanjut</button>
    </div>
</main>

@endsection
