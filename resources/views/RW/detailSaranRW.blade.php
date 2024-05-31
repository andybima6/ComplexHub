@extends('layouts.welcome')
@section('content')
    <main class="detail h-dvh w-3/4 mx-auto relative top-36">
        <div class="relative p-12 bg-white rounded-lg">
            <p class="text-start font-semibold text-xl mb-4">Detail Saran Kegiatan</p>
            <hr class="mb-4 mr-6">

            <div class="mb-4">


                <label for="" class="block text-lg font-bold text-gray-700">Hal yang diajukan :</label>
                <p class="font-medium">{{ $suggestion->name }}</p>
            </div>
            <div class="mb-4">
                <label for="" class="block text-lg font-bold text-gray-700">Tanggal :</label>
                <p class="font-medium">{{ $suggestion->Tanggal }}</p>
            </div>

            <div class="mb-4">
                <label for="" class="block text-lg font-bold text-gray-700">Bidang :</label>
                <p class="font-medium">{{ $suggestion->field }}</p>
            </div>

            <div class="mb-4">
                <label for="" class="block text-lg font-bold text-gray-700">Bidang :</label>
                <p class="font-medium">{{ $suggestion->Laporan }}</p>
            </div>

            <div class="mb-4">
                <label for="" class="block text-lg font-bold text-gray-700">Status :</label>
                <p class="font-medium">{{ $suggestion->status }}</p>
            </div>

            <div class="absolute right-16 bottom-4 ">
                <button type="button"
                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2">
                    <a href="{{ route('saranRW') }}" style="text-decoration:none">Kembali</a>
                </button>
            </div>
        </div>

    </main>
@endsection
