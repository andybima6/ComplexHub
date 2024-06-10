@extends('layouts.welcome')

@section('content')

<style>
  .btn-primary {
    background-color: #007bff;
    color: #fff;
  }

  @media screen and (max-width: 640px) {
    .contain-responsive {
      padding: 8px; /* Adjusting padding for smaller screens */
    }
  }
</style>

<main class="mx-auto p-8 sm:p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
  <div class="container mx-auto p-4 bg-white rounded-md shadow-md" style="max-width: 500px;">
    <header class="flex justify-between items-center mb-4 sm:mb-2">
      <h2 class="text-xl font-semibold text-gray-800">Tambah Kartu Keluarga</h2>
    </header>

    <form action="{{ route('data_kartu_keluargas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
      @csrf

      <div class="flex flex-col">
        <label for="no_kk" class="text-gray-700 font-medium mb-1">No KK</label>
        <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="no_kk" name="no_kk" pattern="[0-9]{16}" title="No KK harus terdiri dari 16 angka." required>
    </div>

    <div class="flex flex-col">
      <label for="kepala_keluarga" class="text-gray-700 font-medium mb-1">Kepala Keluarga</label>
      <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="kepala_keluarga" name="kepala_keluarga" pattern="[A-Za-z\s]+" title="Kepala Keluarga hanya boleh mengandung huruf." required>
  </div>

      <div class="flex flex-col">
        <label for="alamat" class="text-gray-700 font-medium mb-1">Alamat</label>
        <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="alamat" name="alamat" required>
      </div>

      <div class="mt-4 mb-4">
        <label for="rt_id" class="block text-sm font-medium text-gray-700">RT</label>
        <input type="text" id="rt_id" name="rt_id" class="mt-1 p-2 block w-full border-gray-300 rounded-md"  style="background-color: #E6E6E6" value="{{ auth()->user()->rt_id }}" readonly>
    </div>

      {{-- <div class="flex flex-col">
        <label for="status_ekonomi" class="text-gray-700 font-medium mb-1">Status Ekonomi</label>
        <select name="status_ekonomi" id="status_ekonomi" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" required>
          <option value="mampu">Mampu</option>
          <option value="tidak mampu">Tidak Mampu</option>
        </select>
      </div> --}}

      <div class="flex flex-col">
        <label for="foto_kartu_keluarga" class="text-gray-700 font-medium mb-1">Foto Kartu Keluarga</label>
        <input type="file" name="foto_kartu_keluarga" id="foto_kartu_keluarga" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500">
      </div>

      <div style="display: flex; justify-content: space-between;">
        <a href="{{ route('data_kartu_keluargas.index') }}" class="btn-primary px-3 py-2 rounded-md focus:outline-none">Kembali</a>
        <form id="submitform" action="submit" method="POST" onclick="SuccessMessage() style="display: inline-block;">
        <button type="submit" class="btn-primary px-3 py-2 rounded-md focus:outline-none">Tambah</button>
        </form>
      </div>
    </form>
  </div>
</main>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function SuccessMessage() {
       Swal.fire({
           title: "Berhasil!",
           text: "Data KK Berhasil Ditambahkan.",
           icon: "success"
       }).then((result) => {
           if (result.isConfirmed) {
               document.getElementById('submitform').submit(); // Mengirim form setelah pengguna menekan tombol OK
           }
       });
   }

   function showImageModal(imageSrc) {
       document.getElementById('modalImage').src = imageSrc;
       document.getElementById('imageModal').style.display = 'flex';
   }

   function hideImageModal() {
       document.getElementById('imageModal').style.display = 'none';
   }
 </script>

