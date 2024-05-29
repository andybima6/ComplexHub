@extends('layouts.welcome')
@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    {{-- <button class="custom-button">Kas Iuran RT</button> --}}

    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white">
        <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: black;">Data Iuran rw:</p>
        <hr class="mb-6">

        <!-- Search form -->
        <form method="GET" action="{{ route('cari') }}">
            <div class="mb-4">
                <label for="rw_id_search" class="block text-sm font-medium text-gray-700">Cari rw ID:</label>
                <input type="text" id="rw_id_search" name="rw_id_search" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan RW ID">
            </div>
            <button type="submit" class="search-button">Cari</button>
        </form>

        <table class="md:table-fixed w-full mt-6">
            <thead>
                <tr>
                    <th class="border px-4 py-2 text-center" style="color: black; width: 10%;">No</th>
                    <th class="border px-4 py-2 text-center" style="color: black; width: 10%;">Nama</th>
                    <th class="border px-4 py-2 text-center" style="color: black; width: 10%;">Periode</th>
                    <th class="border px-4 py-2 text-center" style="color: black; width: 10%;">Total</th>
                    <th class="border px-4 py-2 text-center" style="color: black; width: 15%;">Bukti</th>
                    <th class="border px-4 py-2 text-center" style="color: black; width: 10%;">RW</th>
                    <th class="border px-4 py-2 text-center" style="color: black; width: 10%;">Status</th>
                    {{-- <th class="border px-4 py-2 text-center" style="color: black; width: 15%;">Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($iuran as $ir)
                <tr>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $ir->id }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $ir->nama }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $ir->periode }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $ir->total }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">
                        <div class="flex justify-center">
                            <img src="{{ asset('storage/' . $ir->bukti) }}" alt="Bukti" style="max-width: 100px; max-height: 100px;">
                        </div>
                    </td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $ir->rw_id }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">
                        @if($ir->status == 'disetujui')
                            <button class="bg-green-500 text-white font-bold py-2 px-4 rounded">Disetujui</button>
                        @elseif($ir->status == 'ditolak')
                            <button class="bg-red-500 text-white font-bold py-2 px-4 rounded">Ditolak</button>
                        @endif
                    </td>
                    {{-- <td class="border px-4 py-2 text-center" style="color: black">
                        <div class="flex justify-center">
                            <a href="{{ url('/RW/' . $ir->id . '/ubah') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                            <form action="{{ url('/RW/' . $ir->id) }}" method="POST" class="ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </div>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
