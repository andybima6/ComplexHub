@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
  <div class="rounded-md relative p-16 top-32 left-16 bg-white">
    <div class="card-header mb-4 flex justify-between items-center">
      <h2 class="text-2xl font-semibold">List Data RT</h2>
      <a href="{{ route('rts.create') }}" class="btn btn-primary">Tambah Data RT</a>
    </div>
    <div class="card-body">
      <form action="{{ route('rts.index') }}" method="GET" class="mb-4">
        <div class="flex justify-between items-center">
          <div class="input-group mb-3 w-full">  <input type="text" name="search" class="form-control rounded-md px-4 py-2" placeholder="Cari berdasarkan nama, nomor RT, dll." value="{{ request()->input('search') }}">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button> </div>
          </div>
        </form>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        </div> 
      <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
          <tr>
            <th class="border px-4 py-2 text-center" style="color: black">ID</th>
            <th class="border px-4 py-2 text-center" style="color: black">Nama</th>
            <th class="border px-4 py-2 text-center" style="color: black">RT</th>
            <th class="border px-4 py-2 text-center" style="color: black">Alamat</th>
            <th class="border px-4 py-2 text-center" style="color: black">Nomor Telefon</th>
            <th class="border px-4 py-2 text-center" style="color: black; width: 100px;">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($rts as $rt)
          <tr>
            <td class="border px-4 py-2 text-center" style="color: black">{{ $rt->id }}</td>
            <td class="border px-4 py-2 text-center" style="color: black">{{ $rt->nama }}</td>
            <td class="border px-4 py-2 text-center" style="color: black">{{ $rt->rt }}</td>
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
