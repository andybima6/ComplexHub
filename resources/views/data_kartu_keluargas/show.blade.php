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
<main class="mx-auto p-8 sm:p-16 md:p-36 contain-responsive" style="min-height: 200vh; background-color: #FBEEC1;">

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
                <p>{{ $dataKartuKeluarga->rt_id }}</p>
            </div>
            {{-- <div>
                <p class="font-semibold">Status Ekonomi:</p>
                <p>{{ $dataKartuKeluarga->status_ekonomi }}</p>
            </div> --}}
        </div>
    </div>

    <div class="rounded-md p-16 bg-white mt-8">
      <h4 class="mb-4">Anggota Keluarga</h4>
      <a href="{{ route('data_kartu_keluargas.create_anggota', $dataKartuKeluarga->id) }}" class="btn btn-primary mb-4">Tambah Anggota Keluarga</a>

      @if(count($anggotaKeluargas) > 0)
      <div class="overflow-x-auto">

          <div class="table-responsive">
            <table class="table-auto w-full border-collapse border border-gray-300">
              <thead>
                      <tr>
                          <th class="border px-2 sm:px-4 py-2">ID</th>
                          <th class="border px-2 sm:px-4 py-2">Nama</th>
                          <th class="border px-2 sm:px-4 py-2">NIK</th>
                          <th class="border px-2 sm:px-4 py-2">Tanggal Lahir</th>
                          <th class="border px-2 sm:px-4 py-2">Hubungan Keluarga</th>
                          <th class="border px-2 sm:px-4 py-2">Status Perkawinan</th>
                          <th class="border px-2 sm:px-4 py-2">Alamat</th>
                          <th class="border px-2 sm:px-4 py-2">Jenis Kelamin</th>
                          <th class="border px-2 sm:px-4 py-2">Golongan Darah</th>
                          <th class="border px-2 sm:px-4 py-2">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($anggotaKeluargas as $anggota)
                          <tr>
                              <td class="border px-4 py-2 text-center">{{ $anggota->id }}</td>
                              <td class="border px-4 py-2 text-center">{{ $anggota->nama }}</td>
                              <td class="border px-4 py-2 text-center">{{ $anggota->nik }}</td>
                              <td class="border px-4 py-2 text-center">{{ $anggota->tanggal_lahir }}</td>
                              <td class="border px-4 py-2 text-center">{{ $anggota->hubungan_keluarga }}</td>
                              <td class="border px-4 py-2 text-center">{{ $anggota->status_perkawinan }}</td>
                              <td class="border px-4 py-2 text-center">{{ $anggota->alamat }}</td>
                              <td class="border px-4 py-2 text-center">{{ $anggota->jenis_kelamin }}</td>
                              <td class="border px-4 py-2 text-center">{{ $anggota->golongan_darah }}</td>
                              <td class="border px-4 py-2 text-center">
                                  <div class="flex justify-center">
                                      <a href="{{ route('editAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggota->id]) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                      <form action="{{ route('destroyAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggota->id]) }}" method="POST" style="display:inline;">
                                          @csrf
                                          @method('DELETE')
                                          <button id="deleteBtn" type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                                          Hapus
                                        </button>                                      
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
  } */

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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
  $(function(){
      $(document).on('click', '#deleteBtn', function(e) { // Mengubah selektor menjadi '#deleteBtn'
          e.preventDefault();
          var form = $(this).closest('form');

          Swal.fire({
              title: "Apakah Anda Yakin?",
              text: "Data Yang dihapus tidak bisa kembali!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "YA, Hapus Data!"
          }).then((result) => {
              if (result.isConfirmed) {
                  form.submit();
                  Swal.fire({
                      title: "Deleted!",
                      text: "Your file has been deleted.",
                      icon: "success"
                  });
              }
          });
      });
  });
</script>
@endsection
