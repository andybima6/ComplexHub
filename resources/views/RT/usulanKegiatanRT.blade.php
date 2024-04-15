@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="opsi flex flex-col md:flex-row md:justify-between mt-20">
            <div class="md:w-2/5 h-96 rounded-md md:ml-16 mt-4 md:mt-0"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
                <p class="values w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                    style="font-size: 80px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    RT :
                    <div class="values w-911 h-62 relative md:left-96 top-2 text-center md:text-left"
                        style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                        <select class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <!-- tambahkan opsi lainnya sesuai kebutuhan -->
                        </select>
                    </div>
                </p>
            </div>
            <div class="md:w-2/5 h-96 rounded-md md:relative md:mr-16 mt-8 md:mt-0"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
                <p class="w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                    style="font-size: 60px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    Total Kegiatan :
                    <div class="w-911 h-62 relative md:left-96 top-12 ml-12 text-center md:text-left"
                        style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                        <select class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                        </select>
                    </div>
                </p>
            </div>
        </div>




        <div class="rounded-md relative p-16 top-32 left-16 bg-white">
            <p class="mb-10"  style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Daftar Izin Usaha RT :</p>
            <table class="md:table-fixed w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center w-1/6">No</th>
                        <th class="border px-4 py-2 text-center w-1/6">Nama Kegiatan</th>
                        <th class="border px-4 py-2 text-center w-1/6">Keterangan</th>
                        <th class="border px-4 py-2 text-center w-1/6">Document</th>
                        <th class="border px-4 py-2 text-center w-1/6">Comment</th>
                        <th class="border px-4 py-2 text-center w-1/6">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2 text-center">1</td>
                        <td class="border px-4 py-2 text-center">hala bihalal</td>
                        <td class="border px-4 py-2 text-center">kegiatan ini dilakukan di halaman RW</td>
                        <td class="border px-4 py-2 text-center">
                            <div class="flex justify-center">
                                <img src="{{ asset('img/cosplay.png') }}" alt="">
                            </div>
                        </td>
                        <td class="border px-4 py-2 text-center">sangat bagus pengejuan kegiatannya, tapi ada yang kurang ...</td>
                        <td class="border px-4 py-2 text-center">kegiatan ini dilakukan di halaman RW</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 text-center">2</td>
                        <td class="border px-4 py-2 text-center">nama kegiatan 2</td>
                        <td class="border px-4 py-2 text-center">keterangan kegiatan 2</td>
                        <td class="border px-4 py-2 text-center">
                            <div class="flex justify-center">
                                <img src="{{ asset('img/cosplay.png') }}" alt="">
                            </div>
                        </td>
                        <td class="border px-4 py-2 text-center">comment kegiatan 2</td>
                        <td class="border px-4 py-2 text-center">status kegiatan 2</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 text-center">3</td>
                        <td class="border px-4 py-2 text-center">nama kegiatan 3</td>
                        <td class="border px-4 py-2 text-center">keterangan kegiatan 3</td>
                        <td class="border px-4 py-2 text-center">
                            <div class="flex justify-center">
                                <img src="{{ asset('img/cosplay.png') }}" alt="">
                            </div>
                        </td>
                        <td class="border px-4 py-2 text-center">comment kegiatan 3</td>
                        <td class="border px-4 py-2 text-center">status kegiatan 3</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>
@endsection
