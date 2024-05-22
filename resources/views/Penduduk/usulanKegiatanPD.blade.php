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
                    <div class="relative  w-fit py-2 "
                        style="font-size: 24px; color: #000000; font-family: 'Poppins', sans-serif; font-weight: 100;">
                        Tambah Usulan Kegiatan</div>
                    <hr class="relative " style="border-width: 3px;">

                    <div class="flex flex-col gap-4 my-8">
                        <input type="hidden" name="id" value="">
                        <input id="editNamaKegiatan" name="name" class="relative"
                            style="height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px;"
                            type="text" placeholder="Nama Kegiatan">

                        <textarea id="editKeterangan" rows="10" name="description" class="relative"
                            style="background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                            type="text" placeholder="Keterangan"></textarea>

                        <label for="editFileInput" class="relative max-w-full"
                            style="font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: 400; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; display: flex; align-items: center; justify-content: center;">
                            Upload Document
                        </label>
                        <input id="editFileInput" name="document" style="display: none;" type="file">


                    </div>


                    <div class="absolute right-8 bottom-8 flex flex-row items-center gap-3">
                        <button type="button" data-close-modal="editActivityModal"
                            class="px-4 py-2 text-center rounded-md bg-[#777777] hover:opacity-80 transition flex items-center justify-center text-base text-white font-medium">
                            Close
                        </button>
                        <a href="{{ route('tambahEditKegiatanPD') }}" class="block">
                            <button id="editSaveButton" type="button"
                                class="px-4 py-2 text-center rounded-md bg-[#27AE60] hover:opacity-80 transition flex items-center justify-center text-base text-white font-medium">
                                Save
                            </button>
                        </a>

                    </div>

            </div>
            </form>

        </div>
        </div>
        </div>




        <div class="bgusulan relative" style="position: absolute; top: 45%; left: 8%; z-index: 0;">
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border-radius: 36px; opacity: 0.4;">
            </div>
            <img src="{{ asset('img/background.png') }}" class="justify-center items-center m-0 ]"
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
