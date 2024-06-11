@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-8 sm:p-16 lg:p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm sm:text-base text-center rtl:text-right text-gray-500">
                <thead class="text-xs sm:text-sm uppercase bg-gray-50 text-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Warga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Usaha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Foto Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($izinUsaha as $index => $izin)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $izin->nama_warga }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $izin->nama_usaha }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $izin->deskripsi }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                <img src="{{ asset('storage/' . $izin->foto_produk) }}" alt="Product Image" class="w-24 h-24 object-cover">
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center items-center gap-2">
                                <a href="{{ route('detailIzinUsahaRT', ['id' => $izin->id]) }}">
                                    <button style="width:45px;height:34px;border-radius:10px;background-color:#2F80ED">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.5 3H21.5V9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.5 21H3.5V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M21.5 3L14.5 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M3.5 21L10.5 14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </a>
                                <form action="{{ route('tolakIzinRT', ['id' => $izin->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" style="width:45px;height:34px;border-radius:10px;background-color:#EB5757">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.5 6L6.5 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6.5 6L18.5 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </form>
                                <form action="{{ route('accIzinRT', ['id' => $izin->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" style="width:45px;height:34px;border-radius:10px;background-color:#27AE60">
                                        <svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5 1L6.5 12L1.5 7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
