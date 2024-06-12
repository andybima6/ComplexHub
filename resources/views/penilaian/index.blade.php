@extends('layouts.welcome')

@section('content')

<style>
    /* Table styles */
    table {
        border-collapse: collapse;
        width: 100%;
        margin: 20px auto;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Button styles */
    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
    }

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

    /* Responsive styles */
    @media screen and (max-width: 600px) {
        table {
            width: 100%;
            margin: 10px auto;
            overflow-x: auto;
        }

        #navbar a {
            display: block;
            padding: 10px 0;
            font-size: 18px;
        }

        .btn {
            padding: 8px 16px;
            font-size: 14px;
        }
    }
</style>

<main class="mx-auto p-8 sm:p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">

    <nav id="navbar">
        <a href="{{ url('destinasi/RW/destinasiwisataRW') }}">Beranda</a>
        <a href="{{ url('/kriteria') }}">Kriteria</a>
        <a href="{{ url('/alternatif') }}">Alternatif</a>
        <a href="{{ url('/penilaian') }}">Penilaian</a>
        <a href="{{ url('/saw') }}">Ranking</a>
    </nav>

    <div class="rounded-md relative p-8 sm:p-16 top-12 sm:top-24 left-4 sm:left-16 bg-white mr-4 sm:mr-28 mb-6 sm:mb-10">
        <p class="mb-6 sm:mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
            Penilaian Matriks Keputusan :
        </p>

        <a href="{{ route('penilaian.create') }}" class="btn btn-primary">Isi Penilaian</a>

        <table class="table">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Alternatif</th>
                @foreach($kriterias as $kriteria)
                    <th>{{ $kriteria->nama }}</th>
                @endforeach
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($alternatifs as $alternatif)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $alternatif->nama }}</td>
                    @foreach($kriterias as $kriteria)
                        <td>{{ $alternatif->nilaiKriteria->where('kriteria_id', $kriteria->id)->first()->nilai ?? '0' }}</td>
                    @endforeach
                    <td>
                        <a href="{{ route('penilaian.edit', $alternatif->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
