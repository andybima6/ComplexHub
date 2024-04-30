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
                <form method="post" action="{{ route('tambahKegiatanPD') }}" class="modal-content absolute inset-0 mt-56"
                    style="background-color:#FFFFFF;border-radius:15px;z-indeks:9999;">
                    @csrf
                    <span id="closeModal" class="close">&times;</span>
                    <div class="relative top-6 left-8 "
                        style="font-size: 24px; color: #000000; font-family: 'Poppins', sans-serif; font-weight: 100;">
                        Tambah Usulan Kegiatan</div>
                    <hr class="relative top-8" style="border-width: 3px;">
                    <input id="namaKegiatan" name="name" class="relative top-20 left-10"
                        style="width: 90%; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px;"
                        type="text" placeholder="Nama Kegiatan">

                    <input id="keterangan" name="description" class="relative top-28 left-10"
                        style="width: 90%; height: 144px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                        type="text" placeholder="Keterangan">

                    <input id="document" name="document" class="relative top-28 left-10"
                        style="width: 90%; height: 144px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                        type="text" placeholder="Document">

                    {{-- <label for="fileInput" name="document" class="relative top-36 left-10"
                        style="font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: 400; width: 90%; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; display: flex; align-items: center; justify-content: center;">Upload
                        Document</label>
                    <input id="fileInput" style="display: none;" type="file"> --}}

                    <select id="lingkup" name="rt_id" class="relative top-44 left-10"
                        style="width: 90%; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9; border-radius: 13px;">
                        <option value="1">RT 001</option>
                        <option value="2">RT 002</option>
                    </select>

                    

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
                            onclick="redirectToTambahKegiatanPD()">Save</button>
                    </div>



                </div>
            </div>
        </div>




        <div class="bgusulan relative" style="position: absolute; top: 45%; left: 8%; z-index: 0;">
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); border-radius: 36px; opacity: 0.4;">
            </div>
            <img src="{{ asset('img/background.png') }}" class="justify-center items-center m-0 mr-64"
                style="overflow: scroll; height: 950px; border-radius: 16px; width: 100%; margin-bottom: 0px;"></img>
            <span id="closeModal" class="close" class="flex justify-center"
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 24px; color: white; font-family: 'Poppins', sans-serif; font-weight: 300; width: 80%; max-width: 2000px;">Pengajuan
                kegiatan oleh penduduk di tingkat RW dan RT dapat mengoptimalkan partisipasi penduduk dalam
                pembangunan
                lingkungan serta mempercepat respons dan koordinasi dari pihak berwenang.</span>
        </div>

    </main>

    <script>
        function redirectToTambahKegiatanPD() {
            window.location.href = "{{ route('tambahEditKegiatanPD') }}";
        }

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
