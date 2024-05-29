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
                <a href="{{ url('/metode_dua_spk/kriteria/kriteriadestinasi2') }}">Kriteria</a>
                <a href="{{ url('/metode_dua_spk/alternatifdestinasi2') }}">Alternatif</a>
                <a href="{{ url('/metode_dua_spk/penilaiandestinasi2') }}">Penilaian</a>
                <a href="{{ url('/metode_dua_spk/rankingdestinasi2') }}">Ranking</a>
            </nav>

            <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28">
                <p class="mb-10"
                    style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Hasil
                    Perhitungan :</p>
                <table class="md:table-fixed w-full">
                    <thead>
                        <tr>
                              <h3>Ranking</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Alternative</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rankings as $index => $ranking)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $ranking['alternative'] }}</td>
                                    <td>{{ number_format($ranking['score'], 4) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        </tr>
                        <!-- Add more rows here -->
                        </tbody>
                </table>
            </div>
    </main>
@endsection
