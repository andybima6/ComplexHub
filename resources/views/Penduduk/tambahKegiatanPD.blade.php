@extends('layouts.welcome')
@section('content')
    <main style="overflow-y: auto;">
        <div class="md:justify-between mt-20 py-24 flex">
            <div class="md:ml-52 mt-4 md:mt-0 relative"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); width:350px;height:275px;border-radius:13px">
                <p class="relative md:right-24 top-6 text-center md:text-left;"
                    style="font-size: 45px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    RT :
                <div class="values w-911 h-62 relative md:left-32 top-2 text-center md:text-left"
                    style="font-size: 120px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <a class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                        01

                        <!-- tambahkan opsi lainnya sesuai kebutuhan -->
                    </a>
                </div>
                </p>
            </div>


            <div id="openModal" class="flex relative w-96 top-24 right-0 items-center justify-center mr-64"
                style="background-color: #2F80ED; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); height: 96px; cursor: pointer;">
                <p style="font-size: 24px; color: white; font-family: 'Poppins', sans-serif; font-weight: 300;">
                    + Tambah
                </p>
            </div>
            <!-- Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content absolute inset-0" style="background-color:#FFFFFF;border-radius:15px;">
                    <span id="closeModal" class="close">&times;</span>
                    <div class="relative top-6 left-8 "
                        style="font-size: 24px; color: #000000; font-family: 'Poppins', sans-serif; font-weight: 100;">
                        Tambah Usulan Kegiatan</div>
                    <hr class="relative top-8" style="border-width: 3px;">
                    <input id="namaKegiatan" class="relative top-20 left-10"
                        style="width: 90%; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px;"
                        type="text" placeholder="Nama Kegiatan">

                    <input id="keterangan" class="relative top-28 left-10"
                        style="width: 90%; height: 144px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                        type="text" placeholder="Keterangan">

                    <label for="fileInput" class="relative top-36 left-10"
                        style="font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: 400; width: 90%; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; display: flex; align-items: center; justify-content: center;">Upload
                        Document</label>
                    <input id="fileInput" style="display: none;" type="file">

                    <input id="lingkup" class="relative top-44 left-10"
                        style="width: 90%; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px;"
                        type="text" placeholder="Lingkup">

                    <hr class="garis" style="border-width: 3px;">

                    <div class="absolute bottom-4 right-44 h-16 w-16 text-align-center justify-center"
                        style="background-color: #777777;width:69px;height:43px;border-radius:5px">
                        <p
                            style="font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: 400;display: flex; align-items: center; justify-content: center;color:#FFFFFF;margin-top:10px;font-weight:500">
                            Close</p>
                    </div>

                    <div class="absolute bottom-4 right-24 h-16 w-16 text-align-center justify-center"
                        style="background-color: #27AE60;width:69px;height:43px;border-radius:5px">
                        <button id="saveButton" class="relative left-4"
                            style="font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: 400;display: flex; align-items: center; justify-content: center;color:#FFFFFF;margin-top:10px;font-weight:500"
                            onclick="saveData()">Save</button>

                    </div>
                </div>
            </div>

            {{-- Table Tambah --}}
            <div class="absolute inset-x-0  p-16  left-16 bg-white mr-28 rounded-lg" style = "top:45%">
                <p class="mb-10 text-2xl font-semibold text-gray-800">Daftar Izin Usaha RT :</p>
                <table class="tabelUsulan md:table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 text-center w-1/6">No</th>
                            <th class="border px-4 py-2 text-center w-1/6">Nama Kegiatan</th>
                            <th class="border px-4 py-2 text-center w-1/6">Keterangan</th>
                            <th class="border px-4 py-2 text-center w-1/6">Document</th>
                            <th class="border px-4 py-2 text-center w-1/6">Status</th>
                            <th class="border px-2 py-2 text-center w-1/6">Lingkup</th>
                            <th class="border px-24 py-2 text-center w-1/6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tabelBody">
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
                            <td class="border px-4 py-2 text-center">RT</td>
                            <td class="border px-4 py-2 text-center grid grid-cols-3 gap-0">
                                <a href="{{ route('detailKegiatanPD') }}">
                                <button class=""
                                    style="width:55px;height:34px;border-radius:10px;background-color:blue; font-family: 'Montserrat', sans-serif; font-size: 10px;color:white;">
                                    show
                                </button>
                            </a>

                                <button class="editbutton"
                                    style="width:55px;height:34px;border-radius:10px;background-color:#E2B93B; font-family: 'Montserrat', sans-serif; font-size: 10px;color:white;">
                                    Edit
                                </button>

                                <div id="myModalEdit" class="modal">
                                    <!-- Modal content -->
                                    <div class="modal-content absolute inset-0"
                                        style="background-color:#FFFFFF;border-radius:15px;">
                                        <span id="closeModalEdit" class="close">&times;</span>
                                        <div class="relative top-4 left-2 "
                                            style="font-size: 24px; color: #000000; font-family: 'Poppins', sans-serif; font-weight: 100;">
                                            Edit Usulan Kegiatan</div>
                                        <hr class="relative top-8 righ-12" style="border-width: 3px;">
                                        <input id="editNamaKegiatan" class="relative top-20"
                                            style="width: 90%; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px;"
                                            type="text" placeholder="Nama Kegiatan">

                                        <input id="editKeterangan" class="relative top-28"
                                            style="width: 90%; height: 144px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                                            type="text" placeholder="Keterangan">

                                        <label for="editFileInput" class="relative top-36 left-10 ml-2"
                                            style="font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: 400; width: 90%; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; display: flex; align-items: center; justify-content: center;">Upload
                                            Document</label>
                                        <input id="editFileInput" style="display: none;" type="file">

                                        <input id="editLingkup" class="relative top-44"
                                            style="width: 90%; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px;"
                                            type="text" placeholder="Lingkup">

                                        <hr class="garis" style="border-width: 3px;">

                                        <div class="absolute bottom-4 right-44 h-16 w-16 text-align-center justify-center"
                                            style="background-color: #777777;width:69px;height:43px;border-radius:5px">
                                            <p
                                                style="font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: 400;display: flex; align-items: center; justify-content: center;color:#FFFFFF;margin-top:10px;font-weight:500">
                                                Close</p>
                                        </div>

                                        <div class="absolute bottom-4 right-24 h-16 w-16 text-align-center justify-center"
                                            style="background-color: #27AE60;width:69px;height:43px;border-radius:5px">
                                            <button id="editSaveButton" class="relative left-4"
                                                style="font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: 400;display: flex; align-items: center; justify-content: center;color:#FFFFFF;margin-top:10px;font-weight:500"
                                                onclick="saveEditData()">Save</button>

                                        </div>
                                    </div>
                                </div>

                                <button class=""
                                    style="width:55px;height:34px;border-radius:10px;background-color:#EB5757; font-family: 'Montserrat', sans-serif; font-size: 10px;color:white;">
                                    Delete
                                </button>
                            </td>
                        </tr>

                        <!-- Data akan ditambahkan disini setelah tombol Save ditekan -->
                    </tbody>
                </table>
            </div>

    </main>

    <script>
        // Ambil modal edit
        var modalEdit = document.getElementById('myModalEdit');

        // Ambil tombol edit
        var editButton = document.getElementsByClassName('editbutton')[0];

        // Ambil span elemen untuk menutup modal
        var closeModalEdit = document.getElementById('closeModalEdit');

        // Ketika tombol edit diklik, tampilkan modal
        editButton.onclick = function() {
            modalEdit.style.display = 'block';
        }

        // Ketika tombol tutup di dalam modal diklik, sembunyikan modal
        closeModalEdit.onclick = function() {
            modalEdit.style.display = 'none';
        }

        // Ketika user mengklik di luar modal, sembunyikan modal
        window.onclick = function(event) {
            if (event.target == modalEdit) {
                modalEdit.style.display = 'none';
            }
        }
    </script>
@endsection
