@extends('layouts.welcome')

@section('content')
<style>
    .hidden { display: none; }
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

</style>

<main class="mx-auto p-8 sm:p- md:p-40 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-8 bg-white">
        <div class="flex justify-between items-center mb-6">
            <p class="text-2xl font-bold text-black">Data Kartu Keluarga</p>
            <form action="{{ route('data_kartu_keluargas.create') }}" method="GET">
                <button type="submit" class="search-button bg-blue-500 text-white px-4 py-2 rounded-md">Tambah Kartu Keluarga</button>
            </form>
        </div>

        <form method="GET" action="{{ route('data_kartu_keluargas.index') }}" class="flex items-end mb-6 space-x-4">
            <div class="mb-4">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">
                    <span>Search</span>
                </label>
                <input type="text" id="search" name="search" value="{{ request('search') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="cari" font size="10px">
            </div>
            <div class="mb-4">
              <label for="rt_id" class="block text-sm font-medium text-gray-700">Filter berdasarkan RT:</label>
              <select id="rt_id" name="rt_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" onchange="filterRT()">
                  <option value="">Semua RT</option>
                  @foreach($rts as $rt)
                      <option value="{{ $rt->id }}">{{ $rt->id }}</option>
                  @endforeach
              </select>
          </div>


        </form>

        <div id="no-results" class="hidden">Data tidak ditemukan</div>

        <div class="rounded-md relative p-8 bg-white">
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 text-black font-medium text-center">
                            <th class="border px-2 sm:px-4 py-2">ID</th>
                            <th class="border px-2 sm:px-4 py-2">No KK</th>
                            <th class="border px-2 sm:px-4 py-2">Kepala Keluarga</th>
                            <th class="border px-2 sm:px-4 py-2">Alamat</th>
                            <th class="border px-2 sm:px-4 py-2">RT</th>
                            {{-- <th class="border px-2 sm:px-4 py-2">Status Ekonomi</th> --}}
                            <th class="border px-2 sm:px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="kk-table">
                        @foreach($data_kartu_keluargas as $kk)
                            <tr data-rt="{{ $kk->rt->id ?? 'N/A' }}">
                                <td class="border px-4 py-2 text-center">{{ $kk->id }}</td>
                                <td class="border px-4 py-2 text-center">{{ $kk->no_kk }}</td>
                                <td class="border px-4 py-2 text-center">{{ $kk->kepala_keluarga }}</td>
                                <td class="border px-4 py-2 text-center">{{ $kk->alamat }}</td>
                                <td class="border px-4 py-2 text-center">{{ $kk->rt_id ?? 'N/A' }}</td>
                                {{-- <td class="border px-4 py-2 text-center">{{ $kk->status_ekonomi }}</td> --}}
                                <td class="border px-4 py-4 text-center" style="color: black">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('data_kartu_keluargas.show', $kk->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                                            Lihat
                                        </a>
                                        <a href="{{ route('data_kartu_keluargas.edit', $kk->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                                            Edit
                                        </a>
                                        <form id="delete-form-{{ $kk->id }}" action="{{ route('data_kartu_keluargas.destroy', $kk->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('{{ $kk->id }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                                                Delete
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
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">

  $(function() {
      $('#search').on('input', function() {
          let query = $(this).val();

          $.ajax({
              url: "{{ route('data_kartu_keluargas.search') }}",
              type: "GET",
              data: {'search': query},
              success: function(data) {
                  $('#kk-table').html('');
                  if (data.length > 0) {
                      $('#no-results').addClass('hidden');
                      data.forEach(function(item) {
                          $('#kk-table').append(`
                              <tr>
                                  <td class="border px-4 py-2 text-center">${item.id}</td>
                                  <td class="border px-4 py-2 text-center">${item.no_kk}</td>
                                  <td class="border px-4 py-2 text-center">${item.kepala_keluarga}</td>
                                  <td class="border px-4 py-2 text-center">${item.alamat}</td>
                                  <td class="border px-4 py-2 text-center">${item.rt ? item.rt.rt : 'N/A'}</td>
                                  <td class="border px-4 py-2 text-center">
                                      <div class="flex justify-center">
                                          <a href="/data_kartu_keluargas/${item.id}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">Lihat</a>
                                          <a href="/data_kartu_keluargas/${item.id}/edit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center ml-2">Edit</a>
                                          <form id="delete-form-{{ $kk->id }}" action="{{ route('data_kartu_keluargas.destroy', $kk) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('{{ $kk->id }}')" class="bg-red-500 hover:bg-red-700
                                            text-white font-bold py-2 px-4 rounded flex items-center justify-center ml-2">Delete</button>
                                        </form>
                                      </div>
                                  </td>
                              </tr>
                          `);
                      });
                  } else {
                      $('#no-results').removeClass('hidden');
                  }
              }
          });
      });
  });

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

  function confirmDelete(kk_id) {
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
              document.getElementById('delete-form-' + kk_id).submit();
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

