@extends('layouts.welcome')
@section('content')
<style>

</style>
<main class="mx-auto p-5 sm:p-10 md:p-2 contain-responsive" style="min-height: 50vh; background-color: #FBEEC1;">

    <div class="flex flex-col md:flex-row md:justify-between mt-20 py-24">
        <div class="mt-4 md:mt-0 relative mx-auto md:ml-52"
            style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); width: 90%; max-width: 350px; height: 275px; border-radius: 13px;">
            <p class="relative top-6 text-center md:text-left-3"
                style="font-size: 45px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                RT :
            <div class="values w-full h-62 relative top-2 text-center md:text-left-12"
                style="font-size: 120px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                <a class="bg-transparent border-white outline-none text-white w-full">
                    {{ str_pad(auth()->user()->rt_id, 2, '0', STR_PAD_LEFT) }}
                </a>
            </div>
            </p>
        </div>

        <div id="openModal" class="flex relative w-11/12 md:w-96 mt-8 md:mt-24 mx-auto md:mx-0 md:mr-64 items-center justify-center"
        style="background-color: #2F80ED; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); height: 96px; cursor: pointer;">
        <p class="text-xl md:text-2xl text-white font ml-12">
            + Tambah
        </p>


            <a class= "relative mt-48" href="{{ route('tambahEditKegiatanPD') }}">
                <button class="Btn mt-20 ml-14">
                    SKIP
                    <svg viewBox="0 0 320 512" class="svg">
                        <path d="M52.5 440.6c-9.5 7.9-22.8 9.7-34.1 4.4S0 428.4 0 416V96C0 83.6 7.2 72.3 18.4 67s24.5-3.6 34.1 4.4l192 160L256 241V96c0-17.7 14.3-32 32-32s32 14.3 32 32V416c0 17.7-14.3 32-32 32s-32-14.3-32-32V271l-11.5 9.6-192 160z"></path>
                    </svg>
                </button>
            </a>
        </div>
    </div>

</div>
    </div>



          <!-- Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <form method="POST" action="{{ route('tambahKegiatanPD') }}" enctype="multipart/form-data"
        class="modal-content absolute inset-0 mx-auto mt-20 md:mt-56 w-11/12 md:w-2/3"
        style="background-color:#FFFFFF; border-radius: 15px; z-index: 9999;">
        @csrf
        <span id="closeModal" class="close">&times;</span>
        <div class="relative w-fit py-2 text-center"
            style="font-size: 24px; color: #000000; font-family: 'Poppins', sans-serif; font-weight: 100;">
            Tambah Usulan Kegiatan
        </div>
        <hr class="relative" style="border-width: 3px;">

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

            <textarea id="editKeterangan" rows="10" name="description"
                class="relative p-2 w-full border-gray-300 rounded-md"
                placeholder="Keterangan"></textarea>

            <label for="addFileInput" class="relative p-2 w-full text-center cursor-pointer"
                style="font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: 400; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9; border-radius: 13px; display: flex; align-items: center; justify-content: center;">
                Upload Document
            </label>
            <input id="addFileInput" name="document" style="display: none;" type="file">

            <select id="lingkup" name="rt_id"
                class="relative p-2 w-full border-gray-300 rounded-md"
                style="height: 44px;">
                @foreach ($rts as $rt)
                    <option value="{{ $rt->id }}">RT {{ str_pad($rt->id, 3, '0', STR_PAD_LEFT) }} - {{ $rt->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="absolute right-8 bottom-8 flex flex-row items-center gap-3">
            <button type="button" id="closePopupBtn"
                class="px-4 py-2 text-center rounded-md bg-gray-600 hover:opacity-80 transition flex items-center justify-center text-base text-white font-medium">
                Close
            </button>

            <button id="editSaveButton" type="submit"
                class="px-4 py-2 text-center rounded-md bg-green-600 hover:opacity-80 transition flex items-center justify-center text-base text-white font-medium">
                Save
            </button>
        </div>
    </form>
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
