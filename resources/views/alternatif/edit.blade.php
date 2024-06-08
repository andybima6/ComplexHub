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

        .btn-warning {
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

        /* Pop-up styles */
        #popup {
            display: none;
            position: fixed;
            top: 20px; /* Ubah posisi vertikal menjadi atas */
            left: 50%;
            transform: translateX(-50%); /* Hanya geser secara horizontal */
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 5px;
            z-index: 1000;
            text-align: center;
        }

        .popup {
            animation: fadeInOut 4s forwards;
        }

        @keyframes fadeInOut {
            0% { opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; }
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

            @if (session('success'))
                <div id="popup" class="popup">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST" id="updateForm">
                @csrf
                @method('PUT')
                <table class="md:table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="text-center">Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><input type="text" name="nama" value="{{ old('nama', $alternatif->nama) }}"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn-warning mt-4">Simpan Perubahan</button>
            </form>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check if session has success message and show the popup
            @if (session('success'))
                $('#popup').fadeIn(500, function() {
                    $(this).fadeOut(3000); // Pop-up menghilang setelah 5 detik
                });
            @endif
        });
    </script>
@endsection
