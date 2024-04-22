@extends('layouts.welcome')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
            <div class="rounded-md relative p-16 top-0 left-16 bg-white mr-28">
                <div class="flex justify-between items-center mb-3">
                    <p class="mb-10" style="font-size: 20px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Data KK</p>
                    <a href="{{ route('kk.create') }}" class="btn btn-primary">Tambah KK Baru</a>
                </div>
                <div class="mb-3 flex justify-end" style="border-bottom: 1px solid #000;">
                    <input type="text" id="search" placeholder="Search" style="border: 1px solid #000;">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="border px-2 py-1 text-center" style="width: 8%;">No</th>
                                <th class="border px-4 py-2 text-center" style="width: 20%;">Kepala Keluarga</th>
                                <th class="border px-4 py-2 text-center" style="width: 20%;">No KK</th>
                                <th class="border px-4 py-2 text-center" style="width: 20%;">Status Ekonomi</th>
                                <th class="border px-4 py-2 text-center" style="width: 32%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kks as $kk)
                            <tr>
                                <td class="border px-2 py-1 text-center">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $kk->kepala_keluarga }}</td>
                                <td class="border px-4 py-2">{{ $kk->no_kk }}</td>
                                <td class="border px-4 py-2">{{ $kk->status_ekonomi }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('kk.show', $kk->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                    <a href="{{ route('kk.edit', $kk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kk.destroy', $kk->id) }}" method="POST" class="d-inline">
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
                    Showing 1 to {{ count($kks) }} of {{ count($kks) }} entries
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
