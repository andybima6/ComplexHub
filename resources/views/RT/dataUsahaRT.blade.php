@extends('layouts.welcome')
@section('content')

<style>
    @media only screen and (max-width: 768px) {
    #bungkusKotak {
        max-width: 90%;
        margin-left: 20px;
        max-height: 70%;
    }
    .p-teks {
        font-size: 40px; /* Ukuran teks yang diperkecil */
    }
}

</style>
    {{-- Content --}}
    <main class="mx-auto contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
<<<<<<< HEAD
        <div id="bungkusKotak" class="opsi flex flex-col md:flex-row md:justify-between mt-20">
            <div id="kotak1" class="md:w-2/5 h-96 rounded-md md:ml-16 mt-4 md:mt-0"
=======
        <div class="opsi flex flex-col md:flex-row md:justify-between mt-20">
            <div class="md:w-2/5 h-96 rounded-md md:ml-16 mt-4 md:mt-0"
>>>>>>> 4d7137c09167fe75024e5e20408005d64712a0db
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
                <p class="values w-911 h-62 relative md:left-20 top-16 text-center md:text-left p-teks"
                    style="font-size: 80px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    RT :
                    <div class="values w-911 h-62 relative md:left-96 top-2 text-center md:text-left p-teks"
                        style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                        <selected class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                            <option value="{{ auth()->user()->rt_id }}">{{ auth()->user()->rt_id }}</option>
                            {{-- <option value="02">02</option>
                            <option value="03">03</option> --}}
                        </selected>
                    </div>
                </p>

            </div>
            <div id="kotak2" class="md:w-2/5 h-96 rounded-md md:relative md:mr-16 mt-8 md:mt-0"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
                <p class="w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                    style="font-size: 60px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    Total UMKM :
                    <div class="w-911 h-62 relative md:left-96 top-12 ml-12 text-center md:text-left"
                        style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                        <selected class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                            <option value="{{ count($izinUsaha) }}">{{ count($izinUsaha) }}</option>
                            {{-- <option value="02">02</option>
                            <option value="03">03</option> --}}
                        </selected>
                    </div>
                </p>
            </div>
        </div>
        




        <div class="rounded-md relative p-16 top-32 left-16 bg-white mr-28 overflow-x-auto">
            <p class="mb-10"  style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: black;">Daftar Izin Usaha RT :</p>
            <table class="md:table-fixed w-full">
                <thead>
                    <tr class="bg-gray-200 text-black font-medium text-center">
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">No</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Nama Warga</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Nama Usaha</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Deskripsi</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Foto Produk</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($izinUsaha as $izin)
                    <tr>
                        <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->id }}</td>
                        <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->nama_warga }}</td>
                        <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->nama_usaha }}</td>
                        <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->deskripsi }}</td>
                        <td class="border px-4 py-2 text-center" style="color: black">
                            <div class="flex justify-center">
                                <img style="padding-right: 45%" src="{{ asset('storage/' . $izin->foto_produk) }}" alt="">
                            </div>
                        </td>
                        <td class="border px-4 py-2 text-center" style="color: black">Izin telah di setujui</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
@endsection
