@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-6 md:p-10 lg:p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="rounded-md relative p-4 md:p-8 lg:p-16 top-8 md:top-16 lg:top-32 left-0 md:left-8 lg:left-16"
            style="background-color: white"">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 md:mb-10">
                <p class="text-lg md:text-xl lg:text-2xl font-semibold text-black"
                    style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: black;">Permohonan
                    Izin Usaha:</p>
                <button id="ajukanIzinBtn"
                    class="btn-ajukan bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4 md:mt-0">Ajukan
                    Izin</button>
            </div>
            <hr class="mb-6">
            {{-- <p class="mb-6" style="font-size: 18px; font-family: 'Poppins', sans-serif; font-weight: 500; color: black;">{{ $breadcrumb->subtitle }}</p> --}}
            <div class="overflow-x-auto">

                <table class="md:table-fixed w-full">
                    <thead>
                    <tr>
                        <th class="border px-2 sm:px-4 py-2" style="color: black">No</th>
                        <th class="border px-2 sm:px-4 py-2" style="color: black">Nama Warga</th>
                        <th class="border px-2 sm:px-4 py-2" style="color: black">Nama Usaha</th>
                        <th class="border px-2 sm:px-4 py-2" style="color: black">Deskripsi</th>
                        <th class="border px-2 sm:px-4 py-2" style="color: black">Status dari RT</th>
                        <th class="border px-2 sm:px-4 py-2" style="color: black">Status dari RW</th>
                        <th class="border px-2 sm:px-4 py-2" style="color: black">Foto Produk</th>
                        <th class="border px-2 sm:px-4 py-2" style="color: black">Lingkup</th>
                        <th class="border px-2 sm:px-4 py-2" style="color: black">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($izinUsaha as $index => $izin)
                        <tr>
                            <td class="border px-4 py-2 text-center" style="color: black" data-number="{{ $index + 1 }}">
                                {{ $index + 1 }}</td>
                            <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->nama_warga }}</td>
                            <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->nama_usaha }}</td>
                            <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->deskripsi }}</td>
                            <td class="border px-4 py-2 text-center" style="color: black"><i>{{ $izin->status_rt }}</i></td>
                            <td class="border px-4 py-2 text-center" style="color: black"><i>{{ $izin->status_rw }}</i></td>
                            <td class="border px-4 py-2 text-center" style="color: black">
                                <div class="flex justify-center">
                                    <img class="block mx-auto max-w-xs h-auto" style="max-width: 20%;" src="{{ asset('storage/' . $izin->foto_produk) }}"
                                        alt="">
                                </div>
                            </td>
                            <td class="border px-4 py-2 text-center" style="color: black"><i>RT {{ $izin->rt_id }}</i></td>
                            <td class="border px-4 py-2 text-center" style="color: black">
                                <a href="{{ route('detailIzinUsaha', ['id' => $izin->id]) }}"><button
                                        class="btn-detail bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded"
                                        style="border-radius: 10px">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.5 3H21.5V9" stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M9.5 21H3.5V15" stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M21.5 3L14.5 10" stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M3.5 21L10.5 14" stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button></a>
                                <form action="{{ route('destroy', ['id' => $izin->id]) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn-tolak bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded ml-2"
                                        style="border-radius: 10px"
                                        oncanplay="return confirm('Yakin ingin menghapus izin ini?')">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 6H5H21" stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6"
                                                stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M10 11V17" stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M14 11V17" stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </form>
                                <a href="{{ route('editIzinUsaha', ['id' => $izin->id]) }}">
                                    <button id="editIzin"
                                        class="btn-acc bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded ml-2"
                                        style="border-radius: 10px" data-id="1">
                                        <svg width="25" height="24" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_334_819)">
                                                <path
                                                    d="M11.332 1.99955C11.5071 1.82445 11.715 1.68556 11.9438 1.5908C12.1725 1.49604 12.4177 1.44727 12.6654 1.44727C12.913 1.44727 13.1582 1.49604 13.387 1.5908C13.6157 1.68556 13.8236 1.82445 13.9987 1.99955C14.1738 2.17465 14.3127 2.38252 14.4074 2.61129C14.5022 2.84006 14.551 3.08526 14.551 3.33288C14.551 3.58051 14.5022 3.8257 14.4074 4.05448C14.3127 4.28325 14.1738 4.49112 13.9987 4.66622L4.9987 13.6662L1.33203 14.6662L2.33203 10.9996L11.332 1.99955Z"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_334_819">
                                                    <rect width="16" height="16" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        </div>
    </main>


    <!-- Pop up form -->
    <div id="popupFormAjukan"
        class="fixed top-20 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-md p-8" style="border-radius: 16px; width: 400px;">
            <h2 class="text-lg font-semibold mb-4">Form Ajukan Izin</h2>
            <hr>
            <form id="izinForm" action="{{ route('storeIzin') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-4 mb-4">
                    <label for="nama_warga" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama_warga" name="nama_warga"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6"
                        value="{{ auth()->user()->name }}" readonly>
                </div>
                <div class="mt-4 mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">ID Warga</label>
                    <input type="text" id="user_id" name="user_id"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6"
                        value="{{ auth()->user()->id }}" readonly>
                </div>
                <div class="mb-4">
                    <label for="nama_usaha" class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                    <input type="text" id="nama_usaha" name="nama_usaha"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6">
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Usaha</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 p-2 block w-full border-gray-300 rounded-md"
                        style="background-color: #E6E6E6"></textarea>
                </div>
                <div class="mb-4">
                    <label for="foto_produk" class="block text-sm font-medium text-gray-700">Foto Produk</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input type="file" id="foto_produk" name="foto_produk"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6"
                        onchange="previewImage()">
                </div>
                <div class="mb-4">
                    <label for="rt_id" class="block text-sm font-medium text-gray-700">Lingkup RT</label>
                    <input type="text" id="lingkup" name="rt_id"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6"
                        value="{{ auth()->user()->rt_id }}" readonly>
                </div>

                {{-- <select id="lingkup" name="rt_id" class="relative"
                    style="height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9; border-radius: 13px;">
                    @foreach ($rts as $rt)
                        <option value="{{ $rt->id }}">RT {{ str_pad($rt->id, 3, '0', STR_PAD_LEFT) }} -
                            {{ $rt->nama }}</option>
                    @endforeach
                </select> --}}

                <div class="text-right">
                    <button type="button" id="closePopupBtn"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2">Batal</button>
                        
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- <div id="editPopupForm" class="fixed top-20 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-md p-8" style="border-radius: 16px; width: 400px;">
            <h2 class="text-lg font-semibold mb-4">Form Edit Izin</h2>
            <hr>
            <form id="editIzinForm" action="{{ route('updateIzin', ['id' => $izin->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="izinId" name="izin_id"> <!-- Hidden field for storing izin ID -->
                <div class="mt-4 mb-4">
                    <label for="edit_nama_warga" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="edit_nama_warga" name="nama_warga" class="mt-1 p-2 block w-full border-gray-300 rounded-md"  style="background-color: #E6E6E6">
                </div>
                <div class="mb-4">
                    <label for="edit_nama_usaha" class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                    <input type="text" id="edit_nama_usaha" name="nama_usaha" class="mt-1 p-2 block w-full border-gray-300 rounded-md"  style="background-color: #E6E6E6">
                </div>
                <div class="mb-4">
                    <label for="edit_deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Usaha</label>
                    <textarea id="edit_deskripsi" name="deskripsi" rows="4" class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6"></textarea>
                </div>
                <div class="mb-4">
                    <label for="edit_foto_produk" class="block text-sm font-medium text-gray-700">Foto Produk</label>
                    <img class="edit-img-preview img-fluid mb-3 col-sm-5">
                    <input type="file" id="edit_foto_produk" name="foto_produk" class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6" onchange="editPreviewImage()">
                </div>
                <div class="text-right">
                    <button type="button" id="closeEditPopupBtn" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2">Batal</button>
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div> --}}


    <script>
        // Menampilkan pop up form saat tombol "Ajukan Izin" diklik
        document.getElementById('ajukanIzinBtn').addEventListener('click', function() {
            document.getElementById('popupFormAjukan').classList.remove('hidden');
        });

        // Menyembunyikan pop up form saat tombol "Tutup" diklik
        document.getElementById('closePopupBtn').addEventListener('click', function() {
            document.getElementById('popupFormAjukan').classList.add('hidden');
        });
    </script>
@endsection
