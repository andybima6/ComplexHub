@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
  <div class="container mx-auto p-4 bg-white rounded-md shadow-md" style="max-width: 500px;">
    <header class="flex justify-between items-center mb-2">
      <h2 class="text-xl font-semibold text-gray-800">Tambah Kartu Keluarga</h2>
      <a href="{{ route('data_kartu_keluargas.index') }}" class="btn-primary px-3 py-2 rounded-md focus:outline-none">Kembali</a>
    </header>

    <form action="{{ route('data_kartu_keluargas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
      @csrf

      <div class="flex flex-col">
        <label for="kepala_keluarga" class="text-gray-700 font-medium mb-1">Kepala Keluarga</label>
        <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="kepala_keluarga" name="kepala_keluarga" required>
      </div>

      <div class="flex flex-col">
        <label for="no_kk" class="text-gray-700 font-medium mb-1">No KK</label>
        <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="no_kk" name="no_kk" required>
      </div>

      <div class="flex flex-col">
        <label for="alamat" class="text-gray-700 font-medium mb-1">Alamat</label>
        <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="alamat" name="alamat" required>
      </div>

      <div class="flex flex-col">
        <label for="rt_id" class="text-gray-700 font-medium mb-1">RT</label>
        <select name="rt_id" id="rt_id" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" required>
          @foreach($rts as $rt)
            <option value="{{ $rt->RT_id }}">{{ $rt->rt_id }}</option>
          @endforeach
        </select>
      </div>

      <div class="flex flex-col">
        <label for="status_ekonomi" class="text-gray-700 font-medium mb-1">Status Ekonomi</label>
        <select name="status_ekonomi" id="status_ekonomi" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" required>
          <option value="mampu">Mampu</option>
          <option value="tidak mampu">Tidak Mampu</option>
        </select>
      </div>

      <div class="flex flex-col">
        <label for="foto_kartu_keluarga" class="text-gray-700 font-medium mb-1">Foto Kartu Keluarga</label>
        <input type="file" name="foto_kartu_keluarga" id="foto_kartu_keluarga" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex justify-center pt-4">
        <button type="submit" class="btn-primary px-3 py-2 rounded-md focus:outline-none">Tambah</button>
      </div>
    </form>
  </div>
</main>
@endsection

<style>
  .btn-primary {
    background-color: #007bff;
    color: #fff;
  }
</style>
