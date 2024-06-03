@extends('layouts.welcome')

@section('content')

<style>
    /* Buttons */
.search-button,
.edit-button,
.delete-button {
background-color: #337ab7; /* Blue for primary buttons */
color: #fff; /* White text for contrast */
border: none;
border-radius: 4px; /* Rounded corners */
padding: 8px 16px; /* Adjust padding for comfortable click area */
cursor: pointer; /* Indicate clickable button */
}
.search-button:hover,
.edit-button:hover,
.delete-button:hover {
background-color: #286090; /* Darker shade on hover */
}
</style>
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-8 bg-white">
        <div class="flex justify-between items-center mb-6">
            <p class="text-2xl font-bold text-black">Data Kartu Keluarga</p>
            <form action="{{ route('data_kartu_keluargas.create') }}" method="GET">
                <button type="submit" class="search-button bg-blue-500 text-white px-4 py-2 rounded-md">Tambah Kartu Keluarga</button>
            </form>
        </div>

        <form method="GET" action="{{ route('data_kartu_keluargas.index') }}" class="flex items-end mb-6 space-x-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">
                    <span class="text-blue-600">Search</span>
                </label>
                <input type="text" id="search" name="search" value="{{ request('search') }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan Nama, Alamat, Nomor, dll">
            </div>
            <button type="submit" class="search-button bg-blue-500 text-white px-4 py-2 rounded-md">Cari</button>
        </form>

    <table class="md:table-fixed w-full">
      <thead>
        <tr class="bg-gray-200 text-black font-medium text-center">
          <th class="border px-4 py-2">ID</th>
          <th class="border px-4 py-2">Kepala Keluarga</th>
          <th class="border px-4 py-2">No KK</th>
          <th class="border px-4 py-2">Alamat</th>
          <th class="border px-4 py-2">RT</th>
          <th class="border px-4 py-2">Status Ekonomi</th>
          <th class="border px-4 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data_kartu_keluargas as $index => $kk)
        <tr  data-id="{{ $kk->id }}">
            <td class="border px-4 py-2 text-center" data-number="{{ $index + 1 }}">{{ $index + 1 }}
            </td>
          <td class="border px-4 py-2 text-center">{{ $kk->kepala_keluarga }}</td>
          <td class="border px-4 py-2 text-center">{{ $kk->no_kk }}</td>
          <td class="border px-4 py-2 text-center">{{ $kk->alamat }}</td>
          <td class="border px-4 py-2 text-center">{{ $kk->rt->rt_id }}</td>
          <td class="border px-4 py-2 text-center">{{ $kk->status_ekonomi }}</td>
          <td class="border px-4 py-2 text-center" style="color: black">
            <div class="flex justify-center">
                <a href="{{ route('data_kartu_keluargas.show', $kk->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15.5 3H21.5V9" />
                        <path d="M9.5 21H3.5V15" />
                        <path d="M21.5 3L14.5 10" />
                        <path d="M3.5 21L10.5 14" />
                    </svg>
                </a>
                <a href="{{ route('data_kartu_keluargas.edit', $kk->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center ml-2">
                    <svg class="w-5 h-5" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17.5 1L6.5 12L1.5 7" />
                    </svg>
                </a>
                <form action="{{ route('data_kartu_keluargas.destroy', $kk->id) }}" method="POST" class="ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete('{{ $kk->id }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18.5 6L6.5 18" />
                            <path d="M6.5 6L18.5 18" />
                        </svg>
                    </button>
                </form>
            </div>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>

<script>
  function confirmDelete(id) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
      document.getElementById('delete-form-' + id).submit();
    }else{
        return false;
    }
  }
</script>

@endsection
