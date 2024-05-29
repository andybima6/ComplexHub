@extends('layouts.welcome')

@section('content')

<style>
    /* Layout and Whitespace */
  
  
  /* Color and Contrast */
  body {
  background-color: #fff; /* Light background for better contrast */
  }
  
  
  
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
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white">
        <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: black;">Data Kartu Keluarga</p>
        <a href="{{ route('data_kartu_keluargas.create') }}" class="btn btn-primary mb-4">Tambah Kartu Keluarga</a>
       
        <!-- Search form -->
        <form method="GET" action="{{ route('data_kartu_keluargas.index') }}">
            <div class="mb-4">
                <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                <input type="text" id="search" name="search" value="{{ request('search') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan Nama, Alamat, Nomor, dll">
            </div>
            <button type="submit" class="search-button">Cari</button>
        </form>
        
        <table class="md:table-fixed w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2 text-center" style="color: black">ID</th>
                    <th class="border px-4 py-2 text-center" style="color: black">Kepala Keluarga</th>
                    <th class="border px-4 py-2 text-center" style="color: black">No KK</th>
                    <th class="border px-4 py-2 text-center" style="color: black">Alamat</th>
                    <th class="border px-4 py-2 text-center" style="color: black">RT</th>
                    <th class="border px-4 py-2 text-center" style="color: black">Status Ekonomi</th>
                    <th class="border px-4 py-2 text-center" style="color: black">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_kartu_keluargas as $kk)
                <tr>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $kk->id }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $kk->kepala_keluarga }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $kk->no_kk }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $kk->alamat }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $kk->rt->rt }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $kk->status_ekonomi }}</td>
                    <td class="border px-4 py-2 text-center">
                        
                        <form id="delete-form-{{ $kk->id }}" action="{{ route('data_kartu_keluargas.destroy', $kk->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            
                        </form>
                        <div class="flex justify-center items-center gap-2 mt-2">
                            <a href="{{ route('data_kartu_keluargas.show', $kk->id) }}">
                                <button style="width:45px;height:34px;border-radius:10px;background-color:#2F80ED">
                                    <svg style="margin-left: 10px;margin-top:2px" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.5 3H21.5V9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9.5 21H3.5V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M21.5 3L14.5 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3.5 21L10.5 14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </a>
                            <a href="{{ route('data_kartu_keluargas.edit', $kk->id) }}">
                                <button style="width:45px;height:34px;border-radius:10px;background-color:#e7ee1d">
                                    <svg style="margin-left: 12px;margin-top:2px" width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.5 1L6.5 12L1.5 7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </a>
                            <form action="{{ route('data_kartu_keluargas.destroy', $kk->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="width:45px;height:34px;border-radius:10px;background-color:#EB5757">
                                    <svg style="margin-left: 10px;margin-top:2px" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.5 6L6.5 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M6.5 6L18.5 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </form>
                        </div>                        
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
        }
    }
</script>
@endsection
