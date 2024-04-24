@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white">
            <div class="flex justify-between items-center mb-10">
                <p style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: black;">Permohonan Izin Usaha:</p>
                <button id="ajukanIzinBtn" class="btn-ajukan bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Ajukan Izin</button>
            </div>
            <hr class="mb-6">
            {{-- <p class="mb-6" style="font-size: 18px; font-family: 'Poppins', sans-serif; font-weight: 500; color: black;">{{ $breadcrumb->subtitle }}</p> --}}
            <table class="md:table-fixed w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">No</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Nama Warga</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Nama Usaha</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Deskripsi</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Status dari RT</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Status dari RW</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Foto Produk</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2 text-center" style="color: black">1</td>
                        <td class="border px-4 py-2 text-center" style="color: black">Miguel Santoso</td>
                        <td class="border px-4 py-2 text-center" style="color: black">Mi Amor Bakery</td>
                        <td class="border px-4 py-2 text-center" style="color: black">Kami menjual aneka ragam kue, dari kue basah hingga kue kering</td>
                        <td class="border px-4 py-2 text-center" style="color: black"><i>Izin telah disetujui oleh ketua RT</i></td>
                        <td class="border px-4 py-2 text-center" style="color: black"><i>Izin telah disetujui oleh ketua RW</i></td>
                        <td class="border px-4 py-2 text-center" style="color: black">
                            <div class="flex justify-center">
                                <img src="{{ asset('img/kopikap.jpg') }}" alt="">
                            </div>
                        </td>
                        <td class="border px-4 py-2 text-center" style="color: black">
                            <button class="btn-detail bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded" style="border-radius: 10px"><a href="{{ route('detailIzinUsaha') }}">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 3H21.5V9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.5 21H3.5V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21.5 3L14.5 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.5 21L10.5 14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></a>
                                </svg>       
                            </button>
                            <button class="btn-tolak bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded ml-2" style="border-radius: 10px">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 6H5H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 11V17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14 11V17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>                                
                            </button>
                            <button id="editIzin" class="btn-acc bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded ml-2" style="border-radius: 10px">
                                <svg width="25" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_334_819)">
                                    <path d="M11.332 1.99955C11.5071 1.82445 11.715 1.68556 11.9438 1.5908C12.1725 1.49604 12.4177 1.44727 12.6654 1.44727C12.913 1.44727 13.1582 1.49604 13.387 1.5908C13.6157 1.68556 13.8236 1.82445 13.9987 1.99955C14.1738 2.17465 14.3127 2.38252 14.4074 2.61129C14.5022 2.84006 14.551 3.08526 14.551 3.33288C14.551 3.58051 14.5022 3.8257 14.4074 4.05448C14.3127 4.28325 14.1738 4.49112 13.9987 4.66622L4.9987 13.6662L1.33203 14.6662L2.33203 10.9996L11.332 1.99955Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_334_819">
                                    <rect width="16" height="16" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>                                   
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    
    
    <!-- Pop up form -->
    <div id="popupForm" class="fixed top-20 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-md p-8" style="border-radius: 16px; width: 400px;">
            <h2 class="text-lg font-semibold mb-4">Form Ajukan Izin</h2>
            <hr>
            <form>
                <div class="mt-4 mb-4">
                    <label for="namaLengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="namaLengkap" name="namaLengkap" class="mt-1 p-2 block w-full border-gray-300 rounded-md"  style="background-color: #E6E6E6">
                </div>
                <div class="mb-4">
                    <label for="NIK" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="text" id="NIK" name="NIK" class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6">
                </div>
                <div class="mb-4">
                    <label for="namaUsaha" class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                    <input type="text" id="namaUsaha" name="namaUsaha" class="mt-1 p-2 block w-full border-gray-300 rounded-md"  style="background-color: #E6E6E6">
                </div>
                <div class="mb-4">
                    <label for="deskripsiUsaha" class="block text-sm font-medium text-gray-700">Deskripsi Usaha</label>
                    <textarea id="deskripsiUsaha" name="deskripsiUsaha" rows="4" class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6"></textarea>
                </div>
                <div class="mb-4">
                    <label for="fotoProduk" class="block text-sm font-medium text-gray-700">Foto Produk</label>
                    <input type="file" id="fotoProduk" name="fotoProduk" class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6">
                </div>
                <div class="text-right">
                    <button type="button" id="closePopupBtn" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2">Batal</button>
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Menampilkan pop up form saat tombol "Ajukan Izin" diklik
        document.getElementById('ajukanIzinBtn').addEventListener('click', function() {
            document.getElementById('popupForm').classList.remove('hidden');
    });

    // Menyembunyikan pop up form saat tombol "Tutup" diklik
    document.getElementById('closePopupBtn').addEventListener('click', function() {
        document.getElementById('popupForm').classList.add('hidden');
    });

    // Menampilkan pop up form dengan data lama saat tombol "Edit" diklik
    document.getElementById('editIzin').addEventListener('click', function() {
    // Mendapatkan elemen-elemen form
    var namaLengkapInput = document.getElementById('namaLengkap');
    var NIKInput = document.getElementById('NIK');
    var namaUsahaInput = document.getElementById('namaUsaha');
    var deskripsiUsahaInput = document.getElementById('deskripsiUsaha');
    var popupForm = document.getElementById('popupForm');
    var formTitle = document.querySelector('#popupForm h2');

    // Mengubah judul form menjadi "Form Edit Izin Usaha"
    formTitle.textContent = 'Form Edit Izin Usaha';

    // Mengisi nilai input dengan data lama (contoh)
    namaLengkapInput.value = "Nama Lengkap Lama";
    NIKInput.value = "NIK Lama";
    namaUsahaInput.value = "Nama Usaha Lama";
    deskripsiUsahaInput.value = "Deskripsi Usaha Lama";

    // Menampilkan pop up form
    popupForm.classList.remove('hidden');
});


</script>
    
@endsection
