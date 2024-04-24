@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="opsi flex flex-col md:flex-row md:justify-between mt-20">
        <div class="page-content md:w-2/5 h-96 rounded-md md:ml-16 mt-4 md:mt-0">
            <div class="container-fluid">
                <div class="rounded-md relative p-16 bg-white">
                    <div class="mb-3 flex justify-end items-center" style="border-bottom: 1px solid #000;">
                        <input type="text" id="search" placeholder="Search" style="border: 1px solid #000; flex: 1;">
                        <a href="{{ route('data_rt.create') }}" class="btn btn-primary ml-3">Tambah RT Baru</a>
                    </div>
                    <div class="table-responsive mx-auto"> <!-- Tambahkan kelas mx-auto di sini -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2 text-center w-1/6">No</th>
                                    <th class="border px-4 py-2 text-center w-1/6">Nama</th>
                                    <th class="border px-4 py-2 text-center w-1/6">RT</th>
                                    <th class="border px-4 py-2 text-center w-1/6">Periode Awal</th>
                                    <th class="border px-4 py-2 text-center w-1/6">Periode Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataRt as $key => $rt)
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $rt->nama }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $rt->rt }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $rt->periode_awal }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $rt->periode_akhir }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
