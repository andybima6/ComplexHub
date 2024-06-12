@extends('layouts.welcome')
@section('content')
<style>
    /* @media (max-width: 414px) {
        relative overflow-x-auto {
            max-width: 90%;
        }
    } */
</style>
    {{-- Content --}}
    <main class="mx-auto contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="rounded-md relative p-16 top-40 left-16 bg-white mr-28 overflow-x-auto">
            <p class="mb-10 mt-10 ml-5"  style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: black;">Daftar Izin Usaha RT:</p>
            <hr>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white-700 uppercase bg-white-50 dark:bg-white-700 dark:text-white-400">
                    <tr class="bg-gray-200 text-black font-medium text-center">
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">No</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Nama Warga</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Nama Usaha</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Deskripsi</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Foto Produk</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Lingkup</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Status dari RT</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($izinUsaha  as $index => $izin)
                    <tr>
    <td class="border px-4 py-2 text-center bg-white" style="color: black" data-number="{{ $index + 1 }}">{{ $index + 1 }}</td>
    <td class="border px-4 py-2 text-center bg-white" style="color: black">{{ $izin->nama_warga }}</td>
    <td class="border px-4 py-2 text-center bg-white" style="color: black">{{ $izin->nama_usaha }}</td>
    <td class="border px-4 py-2 text-center bg-white" style="color: black">{{ $izin->deskripsi }}</td>
    <td class="border px-4 py-2 text-center relative bg-white" style="color: black;">
        <div class="flex justify-center items-center" style="height: 100%;">
            <img style="padding-right: 45%" src="{{ asset('storage/' . $izin->foto_produk) }}" alt="" style="max-width: 100%; height: auto;">
        </div>
    </td>
    <td class="border py-2 text-center bg-white" style="color: black"><i>RT {{ $izin->rt_id }}</i></td>                        
    <td class="border px-4 py-2 text-center bg-white" style="color: black"><i>{{ $izin->status_rt }}</i></td>
    <td class="border px-4 py-2 text-center bg-white" style="color: black">
        <div class="flex justify-center items-center gap-2">
            <a href="{{ route('detailIzinUsahaRW', ['id' => $izin->id]) }}">
                <button class="btn-detail bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded" style="border-radius: 10px">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.5 3H21.5V9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.5 21H3.5V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21.5 3L14.5 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.5 21L10.5 14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </a>
            <form action="{{ route('tolakIzinRW', ['id' => $izin->id]) }}" method="POST" style="display: inline;">
                @csrf
                <button class="btn-tolak bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded ml-2" style="border-radius: 10px" type="submit">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.5 6L6.5 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.5 6L18.5 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </form>
            <form action="{{ route('accIzinRW', ['id' => $izin->id]) }}" method="POST" style="display: inline;">
                @csrf
                <button class="btn-acc bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded ml-2" style="border-radius: 10px" type="submit">
                    <svg width="25" height="24" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5 1L6.5 12L1.5 7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </form>
        </div>
    </td>
</tr>
                   
                    @endforeach
                </tbody>
            </table>
            
        </div>

    </main>
@endsection
