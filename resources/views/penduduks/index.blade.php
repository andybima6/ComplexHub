@extends('layouts.welcome')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
            <div class="rounded-md relative p-16 top-0 left-16 bg-white mr-28">
                <div class="flex justify-between items-center mb-3">
                    <p class="mb-10" style="font-size: 20px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Data Penduduk</p>
                    <a href="{{ route('penduduk.create') }}" class="btn btn-primary">Tambah Penduduk Baru</a>
                </div>
                <div class="mb-3 flex justify-end" style="border-bottom: 1px solid #000;">
                    <input type="text" id="search" placeholder="Search" style="border: 1px solid #000;">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="border px-2 py-1 text-center" style="width: 5%;">No</th>
                                <th class="border px-4 py-2 text-center" style="width: 15%;">Nama</th>
                                <th class="border px-4 py-2 text-center" style="width: 10%;">NIK</th>
                                <th class="border px-4 py-2 text-center" style="width: 10%;">Jenis Kelamin</th>
                                <th class="border px-4 py-2 text-center" style="width: 10%;">Usia</th>
                                <th class="border px-4 py-2 text-center" style="width: 15%;">Tempat Lahir</th>
                                <th class="border px-4 py-2 text-center" style="width: 10%;">Tanggal Lahir</th>
                                <th class="border px-4 py-2 text-center" style="width: 10%;">Agama</th>
                                <th class="border px-4 py-2 text-center" style="width: 15%;">Alamat</th>
                                <th class="border px-4 py-2 text-center" style="width: 10%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penduduks as $penduduk)
                            <tr>
                                <td class="border px-2 py-1 text-center">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $penduduk->nama }}</td>
                                <td class="border px-4 py-2">{{ $penduduk->nik }}</td>
                                <td class="border px-4 py-2">{{ $penduduk->gender }}</td>
                                <td class="border px-4 py-2">{{ $penduduk->usia }}</td>
                                <td class="border px-4 py-2">{{ $penduduk->tmp_lahir }}</td>
                                <td class="border px-4 py-2">{{ $penduduk->tgl_lahir }}</td>
                                <td class="border px-4 py-2">{{ $penduduk->agama }}</td>
                                <td class="border px-4 py-2">{{ $penduduk->alamat }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('penduduk.show', $penduduk->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('penduduk.edit', $penduduk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('penduduk.destroy', $penduduk->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination" style="border-top: 1px solid #000;">
                    Showing 1 to {{ count($penduduks) }} of {{ count($penduduks) }} entries
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
