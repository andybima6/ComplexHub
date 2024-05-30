@extends('layouts.welcome')

@section('content')
<style>
  /* Body */
body {
  font-family: 'Open Sans', sans-serif;
  background-color: #FBEEC1;
  min-height: 100vh;
}

/* Container Utama */
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 36px;
}

/* Judul */
h1 {
  text-align: center;
  font-size: 2.5rem;
  font-weight: bold;
}

/* Subjudul */
h4 {
  font-size: 1.2rem;
  font-weight: bold;
}

/* Paragraf */
p {
  font-size: 1rem;
  line-height: 1.5;
}

/* Data Kepala Keluarga */
.data-kepala-keluarga {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

/* Label Data */
.label {
  font-weight: bold;
}

/* Nilai Data */
.value {
  font-weight: normal;
}

/* Tabel Anggota Keluarga */
.table-anggota-keluarga {
  margin-top: 24px;
}

.table-anggota-keluarga th,
.table-anggota-keluarga td {
  padding: 8px;
  border: 1px solid #ddd;
}

/* Tombol Tambah Anggota */
.btn-primary {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}

  </style>
<main class="mx-auto p-36 container-responsive" style="min-height: 100vh; background-color: #FBEEC1;">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold">Kartu Keluarga</h1>
        <p class="text-gray-500">No. KK: {{ $dataKartuKeluarga->no_kk }}</p>
    </div>

    <div class="rounded-md p-16 bg-white">
      <a href="{{ route('data_kartu_keluargas.index') }}" class="btn btn-primary mb-4">Kembali</a>
        <h4 class="mb-4">Data Kepala Keluarga</h4>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="font-semibold">Nama:</p>
                <p>{{ $dataKartuKeluarga->kepala_keluarga }}</p>
            </div>
            <div>
                <p class="font-semibold">Alamat:</p>
                <p>{{ $dataKartuKeluarga->alamat }}</p>
            </div>
            <div>
                <p class="font-semibold">RT:</p>
                <p>{{ $dataKartuKeluarga->rt->rt }}</p>
            </div>
            <div>
                <p class="font-semibold">Status Ekonomi:</p>
                <p>{{ $dataKartuKeluarga->status_ekonomi }}</p>
            </div>
        </div>
    </div>

    <div class="rounded-md p-16 bg-white mt-8">
      <h4 class="mb-4">Anggota Keluarga</h4>
      <a href="{{ route('data_kartu_keluargas.create_anggota', $dataKartuKeluarga->id) }}" class="btn btn-primary mb-4">Tambah Anggota Keluarga</a>
  
      @if(count($anggotaKeluargas) > 0)
          <div class="table-responsive">
              <table class="table table-bordered table-hover text-center">
                  <thead>
                      <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nama</th>
                          <th scope="col">NIK</th>
                          <th scope="col">Tanggal Lahir</th>
                          <th scope="col">Hubungan Keluarga</th>
                          <th scope="col">Status Perkawinan</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Jenis Kelamin</th>
                          <th scope="col">Golongan Darah</th>
                          <th scope="col">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($anggotaKeluargas as $anggota)
                          <tr>
                              <td>{{ $anggota->id }}</td>
                              <td>{{ $anggota->nama }}</td>
                              <td>{{ $anggota->nik }}</td>
                              <td>{{ $anggota->tanggal_lahir }}</td>
                              <td>{{ $anggota->hubungan_keluarga }}</td>
                              <td>{{ $anggota->status_perkawinan }}</td>
                              <td>{{ $anggota->alamat }}</td>
                              <td>{{ $anggota->jenis_kelamin }}</td>
                              <td>{{ $anggota->golongan_darah }}</td>
                              <td>
                                  <div class="flex justify-center">
                                      <a href="{{ route('editAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggota->id]) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                      <form action="{{ route('destroyAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggota->id]) }}" method="POST" style="display:inline;">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota keluarga ini?')">Hapus</button>
                                      </form>
                                  </div>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      @else
          <div class="alert alert-info" role="alert">
              Belum ada anggota keluarga.
          </div>
      @endif
  </div>
  

</main>
<style>
body {
    font-family: Roboto, sans-serif;
    background-color: #f5f5f5;
    color: #333;
  }
  
  .container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
  }
  
  .main {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 30px;
  }
  
  h1 {
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 20px;
  }
  
  p {
    line-height: 1.6;
    margin-bottom: 15px;
  }
  
  .table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  
  .table th,
  .table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
  }
  
  .table th {
    background-color: #f0f0f0;
  }
  
  .btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  
  .btn:hover {
    background-color: #007bff;
  }
  
  .btn-primary {
    background-color: #007bff;
    color: #fff;
  }
  
  .btn-warning {
    background-color: #ffc107;
    color: #fff;
  }
  
  .btn-danger {
    background-color: #dc3545;
    color: #fff;
  }
  
  .btn-sm {
    padding: 5px 10px;
    font-size: 12px;
  }
  </style>
@endsection
