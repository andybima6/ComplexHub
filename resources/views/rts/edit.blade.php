@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
  <div class="rounded-md relative p-16 left-15" >
    <div class="container mx-auto p-4 bg-white rounded-md shadow-md" style="max-width: 500px;">
      <header class="flex justify-between items-center mb-2">
        <h2 class="text-xl font-semibold text-gray-800">Edit RT</h2>
        <a href="{{ route('rts.index') }}" class="btn btn-primary px-4 py-2 border border-gray-500">Back</a>
      </header>

      <form action="{{ route('rts.update', $rt->id) }}" method="POST" class="space-y-3">
        @csrf
        @method('PUT')

        <div class="flex flex-col">
          <label for="nama" class="text-gray-700 font-medium mb-1">Nama</label>
          <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="nama" name="nama" value="{{ $rt->nama }}" required>
        </div>

        <div class="flex flex-col">
          <label for="rt" class="text-gray-700 font-medium mb-1">RT</label>
          <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="rt" name="rt" value="{{ $rt->rt }}" required>
        </div>

        <div class="flex flex-col">
          <label for="alamat" class="text-gray-700 font-medium mb-1">Alamat</label>
          <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="alamat" name="alamat" value="{{ $rt->alamat }}" required>
        </div>

        <div class="flex flex-col">
          <label for="nomor_telefon" class="text-gray-700 font-medium mb-1">Nomor Telefon</label>
          <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="nomor_telefon" name="nomor_telefon" value="{{ $rt->nomor_telefon }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</main>
@endsection

<style>
  .btn-primary {
    background-color: #007bff;
  }
</style>
