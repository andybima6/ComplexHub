@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 container-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
<div class="container mx-auto p-4 bg-white rounded-md shadow-md" style="max-width: 500px;">
  <header class="flex justify-between items-center mb-2">
    <h2 class="text-xl font-semibold text-gray-800">Tambah Data RT</h2>
    <a href="{{ route('rts.index') }}" class="btn-primary px-3 py-2 rounded-md focus:outline-none">Kembali</a>
  </header>

  <form action="{{ route('rts.store') }}" method="POST" class="space-y-3">
    @csrf

    <div class="flex flex-col">
      <label for="nama" class="text-gray-700 font-medium mb-1">Nama</label>
      <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="nama" name="nama" required>
      @error('nama')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <div class="flex flex-col">
      <label for="rt" class="text-gray-700 font-medium mb-1">RT</label>
      <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="rt" name="rt" required>
      @error('rt')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <div class="flex flex-col">
      <label for="alamat" class="text-gray-700 font-medium mb-1">Alamat</label>
      <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="alamat" name="alamat" required>
      @error('alamat')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <div class="flex flex-col">
      <label for="nomor_telefon" class="text-gray-700 font-medium mb-1">Nomor Telefon</label>
      <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="nomor_telefon" name="nomor_telefon" required>
      @error('nomor_telefon')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <div class="flex justify-center pt-4">
      <button type="submit" class="btn-primary px-3 py-2 rounded-md focus:outline-none">Submit</button>
    </div>
  </form>
</div>
@endsection

<style>
  .btn-primary {
    background-color: #007bff;
    color: #fff;
  }
</style>
