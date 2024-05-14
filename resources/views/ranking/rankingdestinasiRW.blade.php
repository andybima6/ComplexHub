@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">

        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=0">
        <title>Navbar, Tabel</title>
        <style>
            #navbar {
                text-align: center;
            }
            #navbar a {
                display: inline-block;
                padding: 10px 20px;
                text-decoration: none;
                font-size: 24px;
                font-weight: 600;
            }
        </style>
        
        <nav id="navbar">
            <a href="{{ url('destinasi/RW/destinasiwisataRW') }}">Beranda</a>
            <a href="{{ url('destinasi/Destinasi/kriteriadestinasiRW') }}">Kriteria</a>
            <a href="{{ url('destinasi/Destinasi/alternatifdestinasiRW') }}">Alternatif</a>
            <a href="{{ url('destinasi/Destinasi/penilaiandestinasiRW') }}">Penilaian</a>
            <a href="{{ url('destinasi/Destinasi/rankingdestinasiRW') }}">Ranking</a>
        </nav>

        <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28">
            <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Hasil Perhitungan :</p>
            <table class="md:table-fixed w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center w-1/7">No</th>
                        <th class="border px-4 py-2 text-center w-1/7">Fasilitas</th>
                        <th class="border px-4 py-2 text-center w-1/7">Harga Tiket</th>
                        <th class="border px-4 py-2 text-center w-1/7">Kebersihan</th>
                        <th class="border px-4 py-2 text-center w-1/7">Total Nilai</th>
                        <th class="border px-4 py-2 text-center w-1/7">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2 text-center">1</td>
                        <td class="border px-4 py-2 text-center">Sangat lengkap</td>
                        <td class="border px-4 py-2 text-center">Rp. 500.000</td>
                        <td class="border px-4 py-2 text-center">Lumayan bersih</td>
                        <td class="border px-4 py-2 text-center">2,6654</td>
                        <td class="border px-4 py-2 text-center grid grid-cols-3 gap-0">
                            <a href="#" class="inline-block w-full bg-blue-500 text-white py-1 rounded-md text-center">Detail</a>
                            <a href="#" class="inline-block w-full bg-green-500 text-white py-1 rounded-md text-center">Edit</a>
                            <a href="#" class="inline-block w-full bg-red-500 text-white py-1 rounded-md text-center">Delete</a>
                        </td>
                    </tr>
                    <!-- Add more rows here -->
                </tbody>
            </table>
        </div>
    </main>
@endsection
