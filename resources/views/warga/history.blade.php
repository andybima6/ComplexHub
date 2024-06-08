@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-4 sm:p-6 md:p-36" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-4 sm:p-8 md:p-16 top-0 sm:top-8 md:top-32 left-0 sm:left-8 md:left-16 bg-white">
        <div class="card-header mb-4 flex flex-col sm:flex-row justify-between items-center">
            <h2 class="text-lg sm:text-xl md:text-2xl font-semibold">Data Iuran Warga</h2>
        </div>

        <form method="GET" action="{{ route('search') }}" class="flex flex-col sm:flex-row items-start sm:items-end mb-6 space-y-4 sm:space-y-0 sm:space-x-4">
            <div class="w-full sm:w-auto">
                <label for="rt_search" class="block text-sm font-medium text-gray-700 mb-1">
                    <span class="text-blue-600">Search</span>
                </label>
                <input type="text" id="rt_search" name="rt_search" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan Nama">
            </div>
            <button type="submit" class="search-button bg-blue-500 text-white px-4 py-2 rounded-md">Cari</button>
        </form>

        <div class="card-body">
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
                        <th class="border px-2 sm:px-4 py-2">No</th>
                        <th class="border px-2 sm:px-4 py-2">Nama</th>                       
                        <th class="border px-2 sm:px-4 py-2">Periode</th>
                        <th class="border px-2 sm:px-4 py-2">Total</th>
                        <th class="border px-2 sm:px-4 py-2">Bukti</th>
                        <th class="border px-2 sm:px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($iuran as $ir)
                    <tr class="text-center">
                        <td class="border px-2 sm:px-4 py-2">{{ $ir->id }}</td>
                        <td class="border px-2 sm:px-4 py-2">{{ $ir->nama }}</td>
                        <td class="border px-2 sm:px-4 py-2">{{ $ir->periode }}</td>
                        <td class="border px-2 sm:px-4 py-2">{{ $ir->total }}</td>
                        <td class="border px-2 sm:px-4 py-2">
                            <a href="{{ asset('storage/' . $ir->bukti) }}" download>
                                <img src="{{ asset('storage/' . $ir->bukti) }}" alt="Bukti" class="block mx-auto max-w-xs h-auto" style="max-width: 20%;">
                            </a>
                        </td>
                        <td class="border px-2 sm:px-4 py-2">
                            @if($ir->status == 'diproses')
                                <button class="bg-gray-500 text-white font-bold py-1 sm:py-2 px-2 sm:px-4 rounded">Diproses</button>
                            @elseif($ir->status == 'disetujui')
                                <button class="bg-green-500 text-white font-bold py-1 sm:py-2 px-2 sm:px-4 rounded">Disetujui</button>
                            @elseif($ir->status == 'ditolak')
                                <button class="bg-red-500 text-white font-bold py-1 sm:py-2 px-2 sm:px-4 rounded">Ditolak</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
