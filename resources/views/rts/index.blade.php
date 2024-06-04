@extends('layouts.welcome')

@section('content')
<style>

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
  <div class="rounded-md relative p-16 top-32 left-16 bg-white">
    <div class="card-header mb-4 flex justify-between items-center">
      <h2 class="text-2xl font-semibold">List Data RT</h2>
      {{-- <a href="{{ route('rts.create') }}" class="btn btn-primary">Tambah Data RT</a> --}}
    
    </div>


    {{-- <form method="GET" action="{{ route('data_kartu_keluargas.index') }}" class="flex items-end mb-6 space-x-4">
      <div>
          <label for="search" class="block text-sm font-medium text-gray-700 mb-1">
              <span class="text-blue-600">Search</span>
          </label>
          <input type="text" id="search" name="search" value="{{ request('search') }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan Nama, Alamat, Nomor, dll">
      </div>
      <button type="submit" class="search-button bg-blue-500 text-white px-4 py-2 rounded-md">Cari</button>
  </form> --}}

<!-- Search form -->
<form method="GET" action="{{ route('rts.index') }}"class="flex items-end mb-6 space-x-4">
  <div>
    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">
        <span class="text-blue-600">Search</span>
    </label>
    <input type="text" id="search" name="search" value="{{ request('search') }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan Nama, Alamat, Nomor, dll">
</div>
<button type="submit" class="search-button bg-blue-500 text-white px-4 py-2 rounded-md">Cari</button>
</form>

    <div class="card-body">

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        </div>
      <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
          <tr class="bg-gray-200 text-black font-medium text-center">
            <th class="border px-4 py-2 text-center" style="color: black">No</th>
            <th class="border px-4 py-2 text-center" style="color: black">Nama</th>
            <th class="border px-4 py-2 text-center" style="color: black">RT</th>
            <th class="border px-4 py-2 text-center" style="color: black">Alamat</th>
            <th class="border px-4 py-2 text-center" style="color: black">Nomor Telefon</th>
            <th class="border px-0 py-0 text-center" style="color: black">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($rts as $index => $rt)
          <tr>
            <td class="border px-4 py-2 text-center" style="color: black">{{ $index + 1 }}</td>
            <td class="border px-4 py-2 text-center" style="color: black">{{ $rt->nama }}</td>
            <td class="border px-4 py-2 text-center" style="color: black">{{ $rt->rt_id }}</td>
            <td class="border px-4 py-2 text-center" style="color: black">{{ $rt->alamat }}</td>
            <td class="border px-4 py-2 text-center" style="color: black">{{ $rt->nomor_telefon }}</td>
            <td class="border px-4 py-2 text-center">
              <div class="flex justify-center space-x-2">
                <a href="{{ route('rts.edit', $rt) }}" class="btn btn-warning px-2 py-1 bg-yellow-500">Edit</a>
                <form id="delete-form-{{ $rt->id }}" action="{{ route('rts.destroy', $rt) }}" method="POST" style="display: inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="button" onclick="confirmDelete('{{ $rt->id }}')" class="btn btn-danger px-2 py-1 bg-red-500">Delete</button>
                </form>
              </div>
            </td>


          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</main>

<script>
  function confirmDelete(id) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
      document.getElementById('delete-form-' + id).submit();
    }
  }
</script>
@endsection
