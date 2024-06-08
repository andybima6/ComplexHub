@extends('layouts.welcome')

@section('content')
    {{-- Tampilkan pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Content --}}
    <style>
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
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Form filter styles */
        .filter-form {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter-form input,
        .filter-form select,
        .filter-form button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .filter-form button {
            background-color: #007BFF;
            color: white;
            border: none;
        }
    </style>

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
                <a href="{{ url('/kriteria') }}">Kriteria</a>
                <a href="{{ url('/alternatif') }}">Alternatif</a>
                <a href="{{ url('/penilaian') }}">Penilaian</a>
                <a href="{{ url('/saw') }}">Ranking</a>
            </nav>

            <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28">
                <p class="mb-10"
                    style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
                    Data Kriteria Destinasi Wisata:
                </p>

                <!-- Filter Form -->
                <form action="{{ route('kriteria.index') }}" method="GET" class="filter-form">
                    <input type="text" name="search" class="form-control" placeholder="Cari Kriteria..." value="{{ request('search') }}">
                    <select name="jenis" class="form-control">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="benefit" {{ request('jenis') == 'benefit' ? 'selected' : '' }}>Benefit</option>
                        <option value="cost" {{ request('jenis') == 'cost' ? 'selected' : '' }}>Cost</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>

                <table class="md:table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 text-center w-1/10">No</th>
                            <th class="border px-4 py-2 text-center w-1/7">Nama Wisata</th>
                            <th class="border px-4 py-2 text-center w-1/7">Jenis</th>
                            <th class="border px-4 py-2 text-center w-1/7">Bobot</th>
                            <th class="border px-4 py-2 text-center w-1/7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kriterias as $index => $kriteria)
                        <tr>
                            <td class="border px-4 py-2 text-center" data-number="{{ $index + 1 }}">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2 text-center">{{ $kriteria->nama }}</td>
                            <td class="border px-4 py-2 text-center">{{ $kriteria->jenis }}</td>
                            <td class="border px-4 py-2 text-center">{{ $kriteria->bobot }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn btn-warning">Edit</a>
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
