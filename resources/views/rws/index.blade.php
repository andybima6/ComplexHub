@extends('layouts.welcome')

@section('content')
<style>
    .search-button,
    .edit-button,
    .delete-button {
        color: #fff; /* White text for contrast */
        border: none;
        border-radius: 4px; /* Rounded corners */
        padding: 8px 16px; /* Adjust padding for comfortable click area */
        cursor: pointer; /* Indicate clickable button */
    }
</style>

<main class="mx-auto p-4 sm:p-6 md:p-36" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-4 sm:p-8 md:p-16 bg-white">
        <div class="card-header mb-4 flex flex-col sm:flex-row justify-between items-center">
            <h2 class="text-lg sm:text-xl md:text-2xl font-semibold">List Data RT</h2>
            <button type="button" type="submit" style="top:10%" class="search-button bg-blue-500 text-white px-4 py-2 
            rounded-md" class="search-button" onclick="window.location.href='{{ route('rws.create') }}'">Tambah Data RT</button>
          </div>

        <!-- Search form -->
        <form method="GET" action="{{ route('rws.index') }}" class="flex flex-col sm:flex-row items-start sm:items-end mb-6 space-y-4 sm:space-y-0 sm:space-x-4">
            <div class="w-full sm:w-auto">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">
                    <span class="text-blue-600">Search</span>
                </label>
                <input type="text" id="search" name="search" value="{{ request('search') }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan Nama, Alamat, Nomor, dll">
            </div>
            <button type="submit" class="search-button bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Cari</button>
        </form>

        <div class="card-body">

          <!-- Success Message -->
          @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          </div>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
              <thead>
                <tr class="bg-gray-200 text-black font-medium text-center">
                  <th class="border px-2 sm:px-4 py-2 text-center" style="color: black">ID</th>
                  <th class="border px-2 sm:px-4 py-2 text-center" style="color: black">Nama</th>
                  <th class="border px-2 sm:px-4 py-2 text-center" style="color: black">RT</th>
                  <th class="border px-2 sm:px-4 py-2 text-center" style="color: black">Alamat</th>
                  <th class="border px-2 sm:px-4 py-2 text-center" style="color: black">Nomor Telefon</th>
                </tr>
              </thead>
              <tbody>
                @foreach($rws as $rt)
                <tr>
                  <td class="border px-4 py-2 text-center" style="color: black">{{ $rt->id }}</td>
                  <td class="border px-4 py-2 text-center" style="color: black">{{ $rt->nama }}</td>
                  <td class="border px-4 py-2 text-center" style="color: black">{{ $rt->rt_id }}</td>
                  <td class="border px-4 py-2 text-center" style="color: black">{{ $rt->alamat }}</td>
                  <td class="border px-4 py-2 text-center" style="color: black">{{ $rt->nomor_telefon }}</td>
                  {{-- <td class="border px-4 py-2 text-center">
                    <div class="flex justify-center space-x-2">
                      <a href="{{ route('rts.edit', $rt) }}" class="btn btn-warning px-2 py-1 bg-yellow-500">Edit</a>
                      <form id="delete-form-{{ $rt->id }}" action="{{ route('rts.destroy', $rt) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete('{{ $rt->id }}')" class="btn btn-danger px-2 py-1 bg-red-500">Delete</button>
                      </form>
                    </div>
                  </td> --}}
      
      
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
  function confirmDelete(rtId) {
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
              document.getElementById('delete-form-' + rtId).submit();
              Swal.fire({
                  title: "Deleted!",
                  text: "Your file has been deleted.",
                  icon: "success"
              });
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
@endsection