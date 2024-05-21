@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white;">
        <div class="card-header mb-4 flex justify-between items-center">
            <h2 class="text-2xl font-semibold">List Data RT</h2>
            <a href="{{ route('rts.create') }}" class="btn btn-primary">Tambah Data RT</a>
        </div>
        <div class="card-body">
            <form action="{{ route('rts.index') }}" method="GET" class="mb-4">
                <div class="flex justify-between items-center">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama RT...">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center" style="color: black">ID</th>
                        <th class="border px-4 py-2 text-center" style="color: black">Nama</th>
                        <th class="border px-4 py-2 text-center" style="color: black">RT</th>
                        <th class="border px-4 py-2 text-center" style="color: black">Alamat</th>
                        <th class="border px-4 py-2 text-center" style="color: black">Nomor Telefon</th>
                        <th class="border px-4 py-2 text-center" style="color: black; width: 100px;">Action</th> <!-- Ubah lebarnya -->
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
                                    <a href="{{ route('rts.show', $rt) }}" class="btn btn-info">Detail</a>
                                    <a href="{{ route('rts.edit', $rt) }}" class="btn btn-warning">Edit</a>
                                    <form id="delete-form-{{ $rt->id }}" action="{{ route('rts.destroy', $rt) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete('{{ $rt->id }}')" class="btn btn-danger">Delete</button>
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
