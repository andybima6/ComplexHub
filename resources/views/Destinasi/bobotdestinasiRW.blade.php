@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <nav id="navbar">
            <a href="{{ url('destinasi/RW/destinasiwisataRW') }}">Beranda</a>
            <a href="{{ url('destinasi/Destinasi/alternatifdestinasiRW') }}">Alternatif</a>
            <a href="{{ url('destinasi/Destinasi/kriteriadestinasiRW') }}">Kriteria</a>
            <a href="{{ url('destinasi/Destinasi/penilaiandestinasiRW') }}">Penilaian</a>
            <a href="{{ url('destinasi/Destinasi/bobotdestinasiRW') }}">Bobot</a>
            <a href="{{ url('destinasi/Destinasi/rankingdestinasiRW') }}">Ranking</a>
        </nav>

        <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28">
            <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Ubah Bobot dari Kriteria Destinasi Wisata yang ingin di kunjungi :</p>
            <table class="md:table-fixed w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center w-1/7">No</th>
                        <th class="border px-4 py-2 text-center w-1/7">Kriteria</th>
                        <th class="border px-4 py-2 text-center w-1/7">Bobot</th>
                        <th class="border px-4 py-2 text-center w-1/7">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2 text-center">1</td>
                        <td class="border px-4 py-2 text-center">Fasilitas</td>
                        <td class="border px-4 py-2 text-center">2</td>
                        <td class="border px-4 py-2 text-center grid grid-cols-3 gap-0">
                            <a href="#" class="inline-block w-full bg-blue-500 text-white py-1 rounded-md text-center">Detail</a>
                            <a href="#" class="inline-block w-full bg-green-500 text-white py-1 rounded-md text-center">Edit</a>
                            <a href="#" class="inline-block w-full bg-red-500 text-white py-1 rounded-md text-center">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 text-center">2</td>
                        <td class="border px-4 py-2 text-center">Harga Tiket</td>
                        <td class="border px-4 py-2 text-center">1</td>
                        <td class="border px-4 py-2 text-center grid grid-cols-3 gap-0">
                            <a href="#" class="inline-block w-full bg-blue-500 text-white py-1 rounded-md text-center">Detail</a>
                            <a href="#" class="inline-block w-full bg-green-500 text-white py-1 rounded-md text-center">Edit</a>
                            <a href="#" class="inline-block w-full bg-red-500 text-white py-1 rounded-md text-center">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 text-center">3</td>
                        <td class="border px-4 py-2 text-center">Kebersihan</td>
                        <td class="border px-4 py-2 text-center">2</td>
                        <td class="border px-4 py-2 text-center grid grid-cols-3 gap-0">
                            <a href="#" class="inline-block w-full bg-blue-500 text-white py-1 rounded-md text-center">Detail</a>
                            <a href="#" class="inline-block w-full bg-green-500 text-white py-1 rounded-md text-center">Edit</a>
                            <a href="#" class="inline-block w-full bg-red-500 text-white py-1 rounded-md text-center">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection
