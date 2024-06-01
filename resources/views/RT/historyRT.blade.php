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
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16 bg-white">
        <div class="card-header mb-4 flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Data Iuran Warga</h2>
        </div>

        <form method="GET" action="{{ route('search') }}" class="flex items-end mb-6 space-x-4">
            <div>
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

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-black font-medium text-center">
                    <th class="border px-4 py-2 text-center" style="color: black">No</th>
                    <th class="border px-4 py-2 text-center" style="color: black">Nama</th>
                    <th class="border px-4 py-2 text-center" style="color: black">Periode</th>
                    <th class="border px-4 py-2 text-center" style="color: black">Total</th>
                    <th class="border px-4 py-2 text-center" style="color: black">Bukti</th>
                    <th class="border px-4 py-2 text-center" style="color: black">RT</th>
                    <th class="border px-4 py-2 text-center" style="color: black">Status</th>
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
                            <img src="{{ asset('storage/' . $ir->bukti) }}" alt="Bukti" class="block mx-auto max-w-full h-auto">
                        </div>
                    </td>
                    <td class="border px-4 py-2 text-center" style="color: black">{{ $ir->rt_id }}</td>
                    <td class="border px-4 py-2 text-center" style="color: black">
                        @if($ir->status == 'diproses')
                            <button class="bg-gray-500 text-white font-bold py-2 px-4 rounded">Diproses</button>
                        @elseif($ir->status == 'disetujui')
                            <button class="bg-green-500 text-white font-bold py-2 px-4 rounded">Disetujui</button>
                        @elseif($ir->status == 'ditolak')
                            <button class="bg-red-500 text-white font-bold py-2 px-4 rounded">Ditolak</button>
                        @endif
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

<!-- Modal -->
<<div id="imageModal" class="modal" onclick="hideImageModal()">
    <div class="modal-content relative">
        <span class="close" onclick="hideImageModal()">&times;</span>
        <img style="display: block; margin: 0 auto;" id="modalImage" src="" alt="Bukti">
    </div>
</div>

@endsection
