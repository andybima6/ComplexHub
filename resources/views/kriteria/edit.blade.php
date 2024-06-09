@extends('layouts.welcome')

@section('content')
    {{-- Content --}}
    <style>
        /* Table styles */
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 25px auto;
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
            background-color: #007BFF;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none; /* Add this to remove underlines from anchor tags */
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .contain-responsive {
                padding: 10px;
            }
            .p-16 {
                padding: 8px;
            }
            .top-24 {
                top: 8px;
            }
            .left-16 {
                left: 8px;
            }
        }

        /* Form styles */
        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold; /* Make label text bold */
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
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
                Data Kriteria Destinasi Wisata:
            </p>

            <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                @csrf
                @method('PUT')
            
                <div>
                    <label for="nama">Nama Kriteria</label>
                    <input type="text" id="nama" name="nama" value="{{ $kriteria->nama }}" required readonly>
                </div>
            
                <div>
                    <label for="jenis">Jenis</label>
                    <select id="jenis" name="jenis" required>
                        <option value="benefit" {{ $kriteria->jenis == 'benefit' ? 'selected' : '' }}>Benefit</option>
                        <option value="cost" {{ $kriteria->jenis == 'cost' ? 'selected' : '' }}>Cost</option>
                    </select>
                </div>
            
                <div>
                    <label for="bobot">Bobot</label>
                    <input type="number" id="bobot" name="bobot" value="{{ $kriteria->bobot }}" step="0.01" required>
                </div>
            
                <button type="submit">Simpan Perubahan</button>
            </form>
            
        </div>
    </main>
@endsection
