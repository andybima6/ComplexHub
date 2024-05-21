@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white">
        <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: black;">Data Kartu Keluarga</p>
        <a href="{{ route('data_kartu_keluargas.create') }}" class="btn btn-primary mb-4">Tambah Kartu Keluarga</a>
        <table class="md:table-fixed w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2 text-center" style="color: black">ID</th>
                    <th class="border px-4 py-2 text-center" style="color: black">Kepala Keluarga</th>
                    <th class="border px-4 py-2 text-center" style="color: black">No KK</th>
                    <th class="border px-4 py-2 text-center" style="color: black">RT</th>
                    <th class="border px-4 py-2 text-center" style="color: black">Status Ekonomi</th>
                    <th class="border px-4 py-2 text-center" style="color: black">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_kartu_keluargas as $kk)
                <tr>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $kk->id }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $kk->kepala_keluarga }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $kk->no_kk }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $kk->rt->rt }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $kk->status_ekonomi }}</td>
                    <td class="border px-4 py-2 text-center">
                        <a href="{{ route('data_kartu_keluargas.show', $kk->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('data_kartu_keluargas.edit', $kk->id) }}" class="btn btn-warning">Edit</a>
                        <form id="delete-form-{{ $kk->id }}" action="{{ route('data_kartu_keluargas.destroy', $kk->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete('{{ $kk->id }}')" class="btn btn-danger">Hapus</button>
                        </form>
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
