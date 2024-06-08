@extends('layouts.welcome')

@section('content')
<style>
  .btn-primary {
    background-color: #007bff;
  }

  .input-field {
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    padding: 0.5rem;
    outline: none;
  }

  @media (min-width: 640px) {
    .max-w-md {
      max-width: 26rem;
    }
  }
</style>
<main class="mx-auto p-6 sm:p-10 lg:p-16" style="min-height: 100vh; background-color: #FBEEC1;">
  <div class="container mx-auto">
    <div class="max-w-md mx-auto bg-white rounded-md shadow-md">
      <header class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Edit RT</h2>
        <a href="{{ route('rts.index') }}" class="btn btn-primary px-4 py-2 border border-gray-500">Back</a>
      </header>

      <form action="{{ route('rts.update', $rt->id) }}" method="POST" class="px-6 py-4 space-y-4">
        @csrf
        @method('PUT')

        <div class="flex flex-col">
          <label for="nama" class="text-gray-700 font-medium mb-1">Nama</label>
          <input type="text" class="input-field" id="nama" name="nama" value="{{ $rt->nama }}" required>
        </div>

        <div class="flex flex-col">
          <label for="rt" class="text-gray-700 font-medium mb-1">RT</label>
          <input type="text" class="input-field" id="rt" name="rt" value="{{ $rt->rt }}" required>
        </div>

        <div class="flex flex-col">
          <label for="alamat" class="text-gray-700 font-medium mb-1">Alamat</label>
          <input type="text" class="input-field" id="alamat" name="alamat" value="{{ $rt->alamat }}" required>
        </div>

        <div class="flex flex-col">
          <label for="nomor_telefon" class="text-gray-700 font-medium mb-1">Nomor Telefon</label>
          <input type="text" class="input-field" id="nomor_telefon" name="nomor_telefon" value="{{ $rt->nomor_telefon }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</main>


@endsection
