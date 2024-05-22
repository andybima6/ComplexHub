@extends('layouts.welcome')

@section('content')
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <style>
            #navbar {
                display: flex;
                justify-content: center; /* Mengatur item agar berada di tengah secara horizontal */
                align-items: center; /* Mengatur item agar berada di tengah secara vertikal */
                gap: 20px; /* Menambahkan jarak antar item */
            }
            #navbar a {
                padding: 10px 20px;
                text-decoration: none;
                font-size: 24px;
                font-weight: 600;
                color: #000; /* Warna teks */
                transition: color 0.3s; /* Efek transisi warna */
            }
            #navbar a:hover {
                color: #007BFF; /* Warna teks saat dihover */
            }
        </style>

        <nav id="navbar">
            <a href="{{ url('destinasi/RW/berandadestinasiRW') }}">Beranda</a>
            <a href="{{ url('destinasi/Destinasi/kriteriadestinasiRW') }}">Kriteria</a>
            <a href="{{ url('destinasi/Destinasi/alternatifdestinasiRW') }}">Alternatif</a>
            <a href="{{ url('destinasi/Destinasi/penilaiandestinasiRW') }}">Penilaian</a>
            <a href="{{ url('destinasi/Destinasi/rankingdestinasiRW') }}">Ranking</a>
        </nav>

        <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white;">
            <div class="card-header mb-4 flex justify-between items-center">
                <h2 class="text-2xl font-semibold">List Data Alternatif</h2>
                <a href="{{ route('alternatif.create', ['nama' => 'Fasilitas']) }}" class="btn btn-primary">Tambah Alternatif</a>
            </div>
            <div class="card-body">
                <form action="{{ route('Destinasi.alternatifdestinasiRW') }}" method="GET" class="mb-4">
                    <div class="flex justify-between items-center">
                        <input type="text" name="search" class="form-control" placeholder="Cari Kriteria...">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 text-center" style="color: black">ID</th>
                            <th class="border px-4 py-2 text-center" style="color: black">Nama wisata</th>
                            <th class="border px-4 py-2 text-center" style="color: black; width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $item)
                            <tr>
                                <td class="border px-4 py-2 text-center" style="color: black">{{ $item->id }}</td>
                                <td class="border px-4 py-2 text-center" style="color: black">{{ $item->nama wisata }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('detailkriteria', ['id' => $item->id]) }}" class="btn btn-info">Detail</a>
                                        <a href="{{ route('tambahEditkriteria', ['id' => $item->id]) }}" class="btn btn-warning">Edit</a>
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('hapuskriteria', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('{{ $item->id }}')" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endsection
