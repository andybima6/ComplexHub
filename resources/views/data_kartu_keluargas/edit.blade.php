@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
  <div class="rounded-md shadow-md relative p-16 top-32 left-16 bg-white">
    <h2 class="text-2xl font-semibold mb-4">Edit Kartu Keluarga</h2>
    <form action="{{ route('data_kartu_keluargas.update', $dataKartuKeluarga->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="flex flex-col mb-4">
        <label for="kepala_keluarga" class="text-gray-700 font-medium mb-2">Kepala Keluarga</label>
        <input type="text" name="kepala_keluarga" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" value="{{ $dataKartuKeluarga->kepala_keluarga }}" required>
      </div>

      <div class="flex flex-col mb-4">
        <label for="no_kk" class="text-gray-700 font-medium mb-2">No KK</label>
        <input type="text" name="no_kk" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" value="{{ $dataKartuKeluarga->no_kk }}" required>
      </div>

      <div class="flex flex-col mb-4">
        <label for="alamat" class="text-gray-700 font-medium mb-2">Alamat</label>
        <input type="text" name="alamat" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" value="{{ $dataKartuKeluarga->alamat }}" required>
      </div>

      <div class="flex flex-col mb-4">
        <label for="rt_id" class="text-gray-700 font-medium mb-2">RT</label>
        <select name="rt_id" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" required>
          @foreach($rts as $rt)
          <option value="{{ $rt->id }}" {{ $rt->id == $dataKartuKeluarga->rt_id ? 'selected' : '' }}>{{ $rt->rt }}</option>
          @endforeach
        </select>
      </div>

      <div class="flex flex-col mb-4">
        <label for="status_ekonomi" class="text-gray-700 font-medium mb-2">Status Ekonomi</label>
        <select name="status_ekonomi" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" required>
          <option value="mampu" {{ $dataKartuKeluarga->status_ekonomi == 'mampu' ? 'selected' : '' }}>Mampu</option>
          <option value="tidak mampu" {{ $dataKartuKeluarga->status_ekonomi == 'tidak mampu' ? 'selected' : '' }}>Tidak Mampu</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary px-4 py-2 rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update</button>
    </form>
  </div>
</main>
@endsection
