@extends('layouts.welcome')

@section('content')
    {{-- Content --}}
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

        /* Remove border on the bottom of the table body */
        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Style for the "Edit" button within the table cell */
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none; /* Add this to remove underlines from anchor tags */
        }
    </style>
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <nav id="navbar" style="text-align: center;">
            <a href="{{ url('destinasi/RW/destinasiwisataRW') }}">Beranda</a>
            <a href="{{ url('/kriteria') }}">Kriteria</a>
            <a href="{{ url('/alternatif') }}">Alternatif</a>
            <a href="{{ url('/penilaian') }}">Penilaian</a>
            <a href="{{ url('/saw') }}">Ranking</a>
        </nav>

        <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28">
            <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
                Data Kriteria Destinasi Wisata:
            </p>

            <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                @csrf
                @method('PUT')
                <table class="md:table-fixed w-full table">
                    <thead>
                    <tr>
                        <th class="text-center">Jenis</th>
                        <th class="text-center">Bobot</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center"><input type="text" name="jenis" value="{{ $kriteria->jenis }}"></td>
                        <td class="text-center"><input type="text" name="bobot" value="{{ $kriteria->bobot }}"></td>
                    </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
            </form>
        </div>
    </main>
@endsection
