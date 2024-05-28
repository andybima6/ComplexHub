@extends('layouts.welcome')

@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        </head>
        <body>
            <nav id="navbar">
                <a href="{{ url('destinasi/RW/destinasiwisataRW') }}">Beranda</a>
                <a href="{{ url('/metode_dua_spk/kriteriadestinasi2') }}">Kriteria</a>
                <a href="{{ url('/metode_dua_spk/alternatifdestinasi2') }}">Alternatif</a>
                <a href="{{ url('/metode_dua_spk/penilaiandestinasi2') }}">Penilaian</a>
                <a href="{{ url('/metode_dua_spk/rankingdestinasi2') }}">Ranking</a>
            </nav>

            <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28">
                <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
                    Data Kriteria Destinasi Wisata yang ingin di kunjungi :
                </p>
                <table class="md:table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 text-center w-1/7">No</th>
                            <th class="border px-4 py-2 text-center w-1/7">Kriteria</th>
                            <th class="border px-4 py-2 text-center w-1/7">Jenis</th>
                            <th class="border px-4 py-2 text-center w-1/7">Bobot</th>
                            <th class="border px-4 py-2 text-center w-1/7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($criterias as $index => $criteria)
                        <tr>
                            <td class="border px-4 py-2 text-center" data-number="{{ $index + 1 }}">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2 text-center">{{ $criteria->kriteria }}</td>
                            <td class="border px-4 py-2 text-center">{{ $criteria->jenis }}</td>
                            <td class="border px-4 py-2 text-center">{{ $criteria->bobot }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('criterias.edit', $criteria->id) }}" style="width:55px;height:34px;border-radius:10px;background-color:#75751f; font-family: 'Montserrat', sans-serif; font-size: 10px;color:white; display:inline-block; text-align:center; line-height:34px;">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </body>
        </html>
    </main>
@endsection
