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
                <a href="{{ url('/metode_dua_spk/kriteriadestinasi2') }}">Kriteria</a>
                <a href="{{ url('/metode_dua_spk/alternatifdestinasi2') }}">Alternatif</a>
                <a href="{{ url('/metode_dua_spk/penilaiandestinasi2') }}">Penilaian</a>
                <a href="{{ url('/metode_dua_spk/rankingdestinasi2') }}">Ranking</a>
            </nav>

            <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28 mb-10">
                <p class="mb-10"
                    style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
                    Penilaian Matriks Keputusan :
                </p>
                <table class="md:table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 text-center w-1/7">No</th>
                            <th class="border px-4 py-2 text-center w-1/7">Alternatif</th>
                            <th class="border px-4 py-2 text-center w-1/7">Bobot</th>
                            <th class="border px-4 py-2 text-center w-1/7">Biaya Tiket Masuk</th>
                            <th class="border px-4 py-2 text-center w-1/7">Fasilitas</th>

                            <th class="border px-4 py-2 text-center w-1/7">Keamanan</th>
                            <th class="border px-4 py-2 text-center w-1/7">Biaya Akomodasi</th>
                            <th class="border px-4 py-2 text-center w-1/7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($penilaians as $index => $penilaian)
                        <tr>
                            <td class="border px-4 py-2 text-center" data-number="{{ $index + 1 }}">{{ $index + 1 }}
                            </td>
                            <td class="border px-4 py-2 text-center">{{ $penilaian->alternative->alternatif }}</td>
                            <td class="border px-4 py-2 text-center">{{ $penilaian->criteria->bobot }}</td>
                            <td class="border px-4 py-2 text-center">{{ $penilaian->biaya_tiket_masuk }}</td>
                            <td class="border px-4 py-2 text-center">{{ $penilaian->fasilitas }}</td>

                            <td class="border px-4 py-2 text-center">{{ $penilaian->keamanan }}</td>
                            <td class="border px-4 py-2 text-center">{{ $penilaian->biaya_akomodasi }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a class="bg-blue-500 hover:bg-blue-600"
                                    href="{{ route('penilaian.edit', $penilaian->id) }}"
                                    style="width:55px;height:34px;border-radius:10px; font-family: 'Montserrat', sans-serif; font-size: 10px;color:white; display:inline-block; text-align:center; line-height:34px; font-size:12px">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28">
                <p class="mb-10"
                    style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
                    Normalisasi Matriks :
                </p>
                <table class="md:table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 text-center w-1/7">No</th>
                            <th class="border px-4 py-2 text-center w-1/7">Alternatif</th>
                            <th class="border px-4 py-2 text-center w-1/7">Biaya Tiket Masuk</th>
                            <th class="border px-4 py-2 text-center w-1/7">Fasilitas</th>
                            <th class="border px-4 py-2 text-center w-1/7">Kebersihan</th>
                            <th class="border px-4 py-2 text-center w-1/7">Keamanan</th>
                            <th class="border px-4 py-2 text-center w-1/7">Biaya Akomodasi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($normalizedData as $index => $item)
                            <tr>

                                <td class="border px-4 py-2  text-center" data-number="{{ $index + 1 }}">
                                    {{ $index + 1 }}
                                </td>
                                <td class="border px-4 py-2 text-center" >{{ $item['alternative_id'] }}</td>

                                <td  class="border px-4 py-2 text-center">{{ isset($item['biaya_tiket_masuk']) ? number_format($item['biaya_tiket_masuk'], 4) : '-' }}
                                </td>
                                <td  class="border px-4 py-2 text-center">{{ isset($item['fasilitas']) ? number_format($item['fasilitas'], 4) : '-' }}</td>
                                <td  class="border px-4 py-2 text-center">{{ isset($item['kebersihan']) ? number_format($item['kebersihan'], 4) : '-' }}</td>
                                <td  class="border px-4 py-2 text-center">{{ isset($item['keamanan']) ? number_format($item['keamanan'], 4) : '-' }}</td>
                                <td  class="border px-4 py-2 text-center">{{ isset($item['biaya_akomodasi']) ? number_format($item['biaya_akomodasi'], 4) : '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

            </div>
    </main>
@endsection
