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
                        {{ str_pad(auth()->user()->rt_id, 2, '0', STR_PAD_LEFT) }}

                        <!-- tambahkan opsi lainnya sesuai kebutuhan -->
                    </a>
                </div>
                </p>

                <a href="{{ route('tambahEditKegiatanPD') }}">
                    <button class="Btn mt-20 ml-14">
                        SKIP
                        <svg viewBox="0 0 320 512" class="svg">
                            <path
                                d="M52.5 440.6c-9.5 7.9-22.8 9.7-34.1 4.4S0 428.4 0 416V96C0 83.6 7.2 72.3 18.4 67s24.5-3.6 34.1 4.4l192 160L256 241V96c0-17.7 14.3-32 32-32s32 14.3 32 32V416c0 17.7-14.3 32-32 32s-32-14.3-32-32V271l-11.5 9.6-192 160z">
                            </path>
                        </svg>
                    </button>

            </div>
            </a>

            <div id="openModal" class="flex relative w-96 top-24 right-0 items-center justify-center mr-64"
                style="background-color: #2F80ED; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); height: 96px; cursor: pointer;">
                <p style="font-size: 24px; color: white; font-family: 'Poppins', sans-serif; font-weight: 300;">
                    + Tambah
                </p>
            </div>



            <!-- Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <form method="POST" action="{{ route('tambahKegiatanPD') }}" enctype="multipart/form-data"
                    class="modal-content absolute inset-0 mt-56"
                    style="background-color:#FFFFFF;border-radius:15px;z-indeks:9999;">
                    @csrf
                    <span id="closeModal" class="close">&times;</span>
                    <div class="relative  w-fit py-2 "
                        style="font-size: 24px; color: #000000; font-family: 'Poppins', sans-serif; font-weight: 100;">
                        Tambah Usulan Kegiatan</div>
                    <hr class="relative " style="border-width: 3px;">

                    <div class="flex flex-col gap-4 my-8">
                        <input type="hidden" name="id" value="">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6"
                            value="{{ auth()->user()->name }}" readonly>

                            <div class="mt-4 mb-4">
                                <label for="user_id" class="block text-sm font-medium text-gray-700">ID Warga</label>
                                <input type="text" id="user_id" name="user_id"
                                class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6"
                                value="{{ auth()->user()->id }}" readonly>
                                </div>

                        <textarea id="editKeterangan" rows="10" name="description" class="relative"
                            style="background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                            type="text" placeholder="Keterangan"></textarea>




                        <label for="addFileInput" class="relative max-w-full"
                            style="font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: 400; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; display: flex; align-items: center; justify-content: center;">
                            Upload Document
                        </label>
                        <input id="addFileInput" name="document" style="display: none;" type="file">

                        <select id="lingkup" name="rt_id" class="relative"
                            style="height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9; border-radius: 13px;">
                            @foreach ($rts as $rt)
                                <option value="{{ $rt->id }}">RT {{ str_pad($rt->id, 3, '0', STR_PAD_LEFT) }} -
                                    {{ $rt->nama }}</option>
                            @endforeach
                        </select>

                    </div>


                    <div class="absolute right-8 bottom-8 flex flex-row items-center gap-3">

                        <button type="button" id="closePopupBtn"
                            class="px-4 py-2 text-center rounded-md bg-[#777777] hover:opacity-80 transition flex items-center justify-center text-base text-white font-medium">
                            Close
                        </button>

                        <a href="{{ route('tambahEditKegiatanPD') }}">
                        <button id="editSaveButton" type="submit"
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
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border-radius: 36px; opacity: 0.4;">
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
        // Get the modal
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("openModal");
        var closeBtn = document.getElementById("closeModal");
        var cancelBtn = document.getElementById("closePopupBtn");

        btn.onclick = function() {
            modal.style.display = "block";
        }

        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        cancelBtn.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
