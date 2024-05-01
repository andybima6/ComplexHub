@extends('layouts.welcome')
@section('content')
    <main class="container">
        <div class="detail flex justify-center items-center h-screen relative left-32">
            <div class="flex flex-col items-center py-5" style="max-width: none; width: 100%;">
                <div class="rounded-md relative p-8 mb-8 mx-auto"
                    style="background-color: white; max-width: 3000px; width: 90%; height: 500px; position: relative; border-radius: 16px;">
                    <p class="text-start font-semibold text-xl mb-4">Detail Saran Kegiatan</p>
                    <hr class="mb-4">

                    <div class="mb-4">
                        <div class="block text-lg font-bold text-gray-700 text-center">{{ $activity->id }}</div>

                        <label for="" class="block text-lg font-bold text-gray-700">Nama Kegiatan:</label>
                        <p class="font-medium">{{ $activity->name }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="" class="block text-lg font-bold text-gray-700">Keterangan :</label>
                        <p class="font-medium">{{ $activity->description }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="" class="block text-lg font-bold text-gray-700">Document :</label>
                        @if($activity->document)
                        <a href="{{ $activity->document }}" target="_blank" ref="noopener noreferrer"class="flex flex-row gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-5 h-5 fill-red-500"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"/></svg>
                            Lihat dokumen
                        </a>
                        @else
                        Tidak Ada File
                        @endif
                    </div>
                    <div class="mb-4">
                        <label for="" class="block text-lg font-bold text-gray-700">Status :</label>
                        <p class="font-medium">{{ $activity->status }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="" class="block text-lg font-bold text-gray-700">Lingkup :</label>
                        <p class="font-medium">{{ $activity->rt->rt ?? '-' }}</p>
                    </div>

                    <div class="absolute bottom-0 right-32 h-8 w-16 right-0 mb-4">
                        <button type="button"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2">
                            <a href="{{ route('tambahEditKegiatanPD') }}" style="text-decoration:none">Kembali</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
