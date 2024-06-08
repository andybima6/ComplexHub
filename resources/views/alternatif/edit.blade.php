@extends('layouts.welcome')

@section('content')
    <style>
        /* Table styles */
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }

        th, td {
            padding: 12px;
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

        /* Form styles */
        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>

    <main class="mx-auto p-10 md:p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <nav id="navbar" class="text-center mb-10">
            <a href="{{ url('destinasi/RW/destinasiwisataRW') }}" class="mx-2">Beranda</a>
            <a href="{{ url('/kriteria') }}" class="mx-2">Kriteria</a>
            <a href="{{ url('/alternatif') }}" class="mx-2">Alternatif</a>
            <a href="{{ url('/penilaian') }}" class="mx-2">Penilaian</a>
            <a href="{{ url('/saw') }}" class="mx-2">Ranking</a>
        </nav>

        <div class="rounded-md relative p-10 md:p-16 bg-white mx-4 md:mx-28">
            <p class="mb-10 text-2xl font-semibold" style="font-family: 'Poppins', sans-serif; color: #2A424F;">
                Edit Data Alternatif Destinasi Wisata:
            </p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST" id="updateForm">
                @csrf
                @method('PUT')
                <table>
                    <thead>
                        <tr>
                            <th>Nama Wisata</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="nama" value="{{ old('nama', $alternatif->nama) }}"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>
    </main>
@endsection
