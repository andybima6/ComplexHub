@extends('layouts.welcome')

@section('content')
<style>
<<<<<<< HEAD
    @media (max-width: 640px) {
    .responsive-table {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
    }
    .responsive-table thead,
    .responsive-table tbody,
    .responsive-table th,
    .responsive-table td,
    .responsive-table tr {
      display: block;
    }
    .responsive-table thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }
    .responsive-table tr {
      border: 1px solid #ddd;
      margin-bottom: 5px;
    }
    .responsive-table td {
      border: none;
      border-bottom: 1px solid #ddd;
      position: relative;
      padding-left: 50%;
      white-space: normal;
      text-align: left;
    }
    .responsive-table td:before {
      position: absolute;
      top: 6px;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
      text-align: left;
      font-weight: bold;
    }
    .responsive-table td:before {
      content: attr(data-label);
    }
  }




=======
>>>>>>> 395f8a1af393cbb4ddca34b7dac4cbe1b32738aa
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

    /* Modal */
    .modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
}

.modal-content {
    background: white;
    text-align: center;
    max-width: 70%;
    max-height: 70%;
    position: relative; /* Adding position relative */
}

.modal img {
    max-width: 100%;
    max-height: 100%;
    height: auto;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
}
</style>
<main class="mx-auto p-8 sm:p-16 md:p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    {{-- <div class="rounded-md relative p-4 sm:p-8 md:p-16 top-8 sm:top-16 md:top-32 left-2 sm:left-8 md:left-16 bg-white">
        <div class="card-header mb-4 flex justify-between items-center">
            <h2 class="text-lg sm:text-xl md:text-2xl font-semibold">Data Kartu Keluarga</h2>
        </div>
        <form action="{{ route('data_kartu_keluargas.create') }}" method="GET">
            <button type="submit" style="top:10%" class="search-button bg-blue-500 text-white px-4 py-2 rounded-md">Tambah Kartu Keluarga</button>
         </form> 
<form method="GET" action="{{ route('data_kartu_keluargas.index') }}" class="flex items-end mb-6 space-x-4">
    <div>
        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">
            <span class="text-blue-600">Search</span>
        </label>
        <input type="text" id="search" name="search" value="{{ request('search') }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan Nama, Alamat, Nomor, dll">
    </div>
    <button type="submit" class="search-button bg-blue-500 text-white px-4 py-2 rounded-md">Cari</button>
    <div>
      <label for="rt_id" class="block text-sm font-medium text-gray-700 mb-1">
          <span class="text-blue-600">Filter RT</span>
      </label>
      <select id="rt_id" name="rt_id" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" onchange="filterRT()">
          <option value="">Pilih RT</option>
          @foreach($rts as $rt)
              <option value="{{ $rt->rt_id }}">{{ $rt->rt_id }}</option>
          @endforeach
      </select>
<<<<<<< HEAD
    </div> --}}

<main class="mx-auto p-10 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
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
            <div>
              <label for="rt_id" class="block text-sm font-medium text-gray-700 mb-1">
                  <span class="text-blue-600">Filter RT</span>
              </label>
              <select id="rt_id" name="rt_id" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" onchange="filterRT()">
                  <option value="">Pilih RT</option>
                  @foreach($rts as $rt)
                      <option value="{{ $rt->id }} - {{ $rt->nama }}">{{ $rt->id }} - {{ $rt->nama }}</option>
                  @endforeach
              </select>
          </div>
        </form>
    {{-- <div class="rounded-md relative p-8 bg-white">
    <table class="md:table-fixed w-full">
      <thead>
        <tr class="bg-gray-200 text-black font-medium text-center">
          <th class="border px-4 py-2">No</th>
          <th class="border px-4 py-2">Kepala Keluarga</th>
          <th class="border px-4 py-2">No KK</th>
          <th class="border px-4 py-2">Alamat</th>
          <th class="border px-4 py-2">RT</th>
          <th class="border px-4 py-2">Status Ekonomi</th>
          <th class="border px-4 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody id="kk-table">
        @foreach($data_kartu_keluargas as $kk)
        <tr data-rt="{{ $kk->rt->rt_id ?? 'N/A' }}">
          <td class="border px-4 py-2 text-center">{{ $kk->id }}</td>
          <td class="border px-4 py-2 text-center">{{ $kk->kepala_keluarga }}</td>
          <td class="border px-4 py-2 text-center">{{ $kk->no_kk }}</td>
          <td class="border px-4 py-2 text-center">{{ $kk->alamat }}</td>
          <td class="border px-4 py-2 text-center">{{ $kk->rt->rt_id ?? 'N/A' }} - {{ $kk->rt->nama ?? 'N/A' }}</td> 
          <td class="border px-4 py-2 text-center">{{ $kk->status_ekonomi }}</td>
          <td class="border px-4 py-2 text-center" style="color: black">
            <div class="flex justify-center">
              <a href="{{ route('data_kartu_keluargas.show', $kk->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                  Lihat
              </a>
              <a href="{{ route('data_kartu_keluargas.edit', $kk->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center ml-2">
                  Edit
              </a>
              <form action="{{ route('data_kartu_keluargas.destroy', $kk->id) }}" method="POST" class="ml-2" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                      Hapus
                  </button>
              </form>
          </div>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div> --}}
=======
  </div>
        </form>
>>>>>>> 395f8a1af393cbb4ddca34b7dac4cbe1b32738aa

    
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="rounded-md relative p-8 bg-white">
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-black font-medium text-center">
                        <th class="border px-2 sm:px-4 py-2">ID</th>
                        <th class="border px-2 sm:px-4 py-2">Kepala Keluarga</th>
                        <th class="border px-2 sm:px-4 py-2">No KK</th>
                        <th class="border px-2 sm:px-4 py-2">Alamat</th>
                        <th class="border px-2 sm:px-4 py-2">RT</th>
                        <th class="border px-2 sm:px-4 py-2">Status Ekonomi</th>
                        <th class="border px-2 sm:px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($data_kartu_keluargas as $kk)
                  <tr>
                    <td class="border px-4 py-2 text-center">{{ $kk->id }}</td>
                    <td class="border px-4 py-2 text-center">{{ $kk->kepala_keluarga }}</td>
                    <td class="border px-4 py-2 text-center">{{ $kk->no_kk }}</td>
                    <td class="border px-4 py-2 text-center">{{ $kk->alamat }}</td>
                    <td class="border px-4 py-2 text-center">{{ $kk->rt->rt_id ?? 'N/A' }} - {{ $kk->rt->nama ?? 'N/A' }}</td> 
                    <td class="border px-4 py-2 text-center">{{ $kk->status_ekonomi }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">
                      <div class="flex justify-center">
                        <a href="{{ route('data_kartu_keluargas.show', $kk->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                            Lihat
                        </a>
                        <a href="{{ route('data_kartu_keluargas.edit', $kk->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center ml-2">
                            Edit
                        </a>
                        <form action="{{ route('data_kartu_keluargas.destroy', $kk->id) }}" method="POST" class="ml-2" onsubmit="return false;">
                          @csrf
                          @method('DELETE')
                          <button id="deleteBtn" type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                              Hapus
                          </button>
                      </form>
                      
                    </div>          
                  </td>        
                  </tr>
                  @endforeach
                </tbody>
                
            </table>
        </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
  $(function(){
      $(document).on('click', '#deleteBtn', function(e) { // Mengubah selektor menjadi '#deleteBtn'
          e.preventDefault();
          var form = $(this).closest('form');

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
                  form.submit();
                  Swal.fire({
                      title: "Deleted!",
                      text: "Your file has been deleted.",
                      icon: "success"
                  });
              }
          });
      });
  });

  function showImageModal(imageSrc) {
      document.getElementById('modalImage').src = imageSrc;
      document.getElementById('imageModal').style.display = 'flex';
  }

  function hideImageModal() {
      document.getElementById('imageModal').style.display = 'none';
  }
</script>
<<<<<<< HEAD




<script>
  function filterRT() {
    var selectedRT = document.getElementById('rt_id').value;
    var rows = document.querySelectorAll('#kk-table tr');
    rows.forEach(function(row) {
      if (selectedRT === "" || row.getAttribute('data-rt') === selectedRT) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  }
</script>

=======
>>>>>>> 395f8a1af393cbb4ddca34b7dac4cbe1b32738aa
@endsection

