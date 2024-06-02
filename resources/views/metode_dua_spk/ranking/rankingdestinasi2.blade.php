@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <nav id="navbar">
            <a href="{{ url('destinasi/RW/destinasiwisataRW') }}">Beranda</a>
            <a href="{{ url('/metode_dua_spk/kriteria/kriteriadestinasi2') }}">Kriteria</a>
            <a href="{{ url('/metode_dua_spk/alternatifdestinasi2') }}">Alternatif</a>
            <a href="{{ url('/metode_dua_spk/penilaiandestinasi2') }}">Penilaian</a>
            <a href="{{ url('/metode_dua_spk/rankingdestinasi2') }}">Ranking</a>
        </nav>

        <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28">
            <p class="mb-10"
                style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
                Hasil Perhitungan :</p>
            <table class="table-fixed w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2 text-center">Peringkat</th>
                        <th class="border px-4 py-2 text-center">Alternative</th>
                        <th class="border px-4 py-2 text-center">Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rankingScores as $index => $ranking)
                    <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="border px-4 py-2 text-center" data-number="{{ $index + 1 }}">
                            {{ $index + 1 }}
                        </td>
                        <td class="border px-4 py-2 text-center">
                            {{ \App\Models\Alternative::find($ranking['alternative_id'])->alternatif }}
                        </td>
                        <td class="border px-4 py-2 text-center">{{ number_format($ranking['score'], 4) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

<style>
    #navbar {
        text-align: center;
        margin-bottom: 20px;
    }

    #navbar a {
        display: inline-block;
        padding: 10px 20px;
        text-decoration: none;
        font-size: 24px;
        font-weight: 600;
        color: #333;
        transition: background-color 0.3s ease;
    }

    #navbar a:hover {
        background-color: #ddd;
    }

    .table-fixed {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table-fixed th, .table-fixed td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center;
    }

    .table-fixed thead th {
        background-color: #f2f2f2;
    }

    .table-fixed tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table-fixed tbody tr:hover {
        background-color: #f1f1f1;
    }

    .bg-gray-200 {
        background-color: #f2f2f2;
    }

    .bg-gray-100 {
        background-color: #f9f9f9;
    }

    .bg-white {
        background-color: #ffffff;
    }
</style>
