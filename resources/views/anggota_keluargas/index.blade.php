@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-8 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="m-0">Daftar Anggota Keluarga</h3>
            <a href="{{ route('createAnggota', $dataKartuKeluarga->id) }}" class="btn btn-primary float-end">Tambah Anggota Keluarga</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Hubungan Keluarga</th>
                            <th class="text-center">Status Perkawinan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataKartuKeluarga->anggotaKeluargas as $anggota)
                            <tr>
                                <td class="text-center">{{ $anggota->id }}</td>
                                <td>{{ $anggota->nama }}</td>
                                <td>{{ $anggota->nik }}</td>
                                <td class="text-center">{{ $anggota->tanggal_lahir }}</td>
                                <td>{{ $anggota->hubungan_keluarga }}</td>
                                <td>{{ $anggota->status_perkawinan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('editAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggota->id]) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('destroyAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggota->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
