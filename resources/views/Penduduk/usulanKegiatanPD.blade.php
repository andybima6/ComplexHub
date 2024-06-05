@extends('layouts.welcome')
@section('content')
<style>
    .responsive-text {
        font-size: 4vw; /* Ukuran font relatif untuk perangkat mobile */
    }

    @media (min-width: 768px) {
        /* Media query untuk tampilan desktop */
        .responsive-text {
            font-size: 25px; /* Ukuran font relatif yang lebih kecil untuk desktop */
        }

        /* Menyesuaikan ukuran span */
        .close {
            font-size: 20px; /* Ukuran font span */
        }
    }

     @media (min-width: 768px) {
        /* Media query untuk tampilan desktop */
        .mobile-input,
        .mobile-textarea,
        .mobile-label {
            font-size: 16px; /* Ukuran font untuk desktop */
            height: auto; /* Tinggi yang responsif */
        }
    }
    
    #tambahKegiatan {
    max-width: 300px; /* Atur lebar maksimum */
}

.mobile-input,
.mobile-textarea,
.mobile-label {
    font-size: 12px; /* Atur ukuran font */
}

.mobile-input {
    padding: 6px; /* Kurangi padding */
}

.mobile-textarea {
    padding: 6px; /* Kurangi padding */
}

.mobile-label {
    padding: 8px; /* Kurangi padding */
    height: 30px; /* Atur tinggi */
}

#editFileInput {
    border: none; /* Hapus border */
}

/* Agar tombol-tombol tetap terlihat proporsional */
button {
    font-size: 12px; /* Atur ukuran font */
    padding: 6px 12px; /* Atur padding */
}

#tambahKegiatan {
  /* Base styles */
  background-color: #fff; /* Light background */
  border-radius: 10px; /* Rounded corners */
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
  padding: 20px; /* Padding for content spacing */
  margin: 0 auto; /* Center the form horizontally */
  max-width: 600px; /* Set a maximum width for responsiveness */

  /* Flexbox for responsive layout */
  display: flex;
  flex-direction: column;
  gap: 16px; /* Spacing between elements */
}

#tambahKegiatan label {
  font-size: 14px; /* Consistent font size */
  font-weight: 500; /* Slightly bolder for emphasis */
  color: #333; /* Darker text color */
  margin-bottom: 4px; /* Small margin for separation */
}

#tambahKegiatan input[type="text"],
#tambahKegiatan textarea {
  border: 1px solid #ccc; /* Consistent border */
  border-radius: 5px; /* Rounded corners */
  font-size: 14px;
  padding: 10px; /* Consistent padding */
  width: 100%; /* Ensure full width */
}

#tambahKegiatan textarea {
  resize: vertical; /* Allow vertical resizing */
  min-height: 100px; /* Set minimum height */
}

#tambahKegiatan .mobile-label {
  background-color: #e0e0e0; /* Lighter background for button */
  color: #333; /* Consistent text color */
  cursor: pointer; /* Indicate hover interaction */
  transition: background-color 0.2s ease; /* Smoother background color transition */
  overflow: hidden; /* Prevent text overflow */
  white-space: nowrap; /* Prevent text wrapping */
  text-overflow: ellipsis; /* Ellipsis for long text */
  display: inline-flex; /* Ensure inline behavior for responsive layout */
  align-items: center;
  justify-content: center;
  padding: 10px 20px; /* Consistent padding */
  border: none; /* Remove unnecessary border */
  border-radius: 5px; /* Rounded corners */
}

#tambahKegiatan .mobile-label:hover {
  background-color: #ddd; /* Lighter background on hover */
}

#tambahKegiatan button {
  background-color: #4CAF50; /* Green button color */
  color: #fff; /* White text color */
  border: none; /* Remove unnecessary border */
  border-radius: 5px; /* Rounded corners */
  padding: 10px 20px; /* Consistent padding */
  font-size: 14px;
  cursor: pointer; /* Indicate hover interaction */
  transition: background-color 0.2s ease;
}

#tambahKegiatan button:hover {
  background-color: #3e8e41; /* Darker green on hover */
}

#tambahKegiatan button[type="button"] { /* Style for "Close" button */
  background-color: #f44336; /* Red button color */
}

#tambahKegiatan button[type="button"]:hover {
  background-color: #da291c; /* Darker red on hover */
}

</style>
<main class="overflow-y-auto">
    <div class="md:justify-between mt-20 py-24 flex flex-col md:flex-row">
        <div class="md:ml-52 mt-4 md:mt-0 relative mx-auto md:mx-0"
            style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); width:90%; max-width:350px;height:275px;border-radius:13px">
            <p class="relative top-6 text-center md:text-left"
                style="font-size: 45px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                RT :
            <div class="values w-full md:w-911 h-62 relative md:left-32 top-2 text-center md:text-left"
                style="font-size: 120px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                <a class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                    01
                </a>
            </div>
            </p>
        </div>

        <div id="openModal" class="flex relative w-11/12 max-w-96 top-24 right-0 items-center justify-center mx-auto md:mr-64 mt-6 md:mt-0"
            style="background-color: #2F80ED; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); height: 96px; cursor: pointer;">
            <p style="font-size: 24px; color: white; font-family: 'Poppins', sans-serif; font-weight: 300;">
                + Tambah
            </p>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal hidden fixed inset-0 z-50 overflow-auto">
            <!-- Modal content -->
            <form method="post" action="{{ route('tambahKegiatanPD') }}" class="modal-content relative bg-transparent w-full max-w-md mx-auto mt-24 md:mt-56 p-8 rounded-md shadow-lg"
                style="z-index: 9999;">

                @csrf
                <span id="closeModal" class="close absolute top-2 right-2 cursor-pointer">&times;</span>

                <hr class="relative border-3 my-2">

                <div id="tambahKegiatan" class="flex flex-col gap-4 my-8">
                    <input type="hidden" name="id" value="">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="mobile-input mt-1 p-2 block w-full border-gray-300 rounded-md bg-gray-200" value="{{ auth()->user()->name }}" readonly>
                    <textarea id="editKeterangan" rows="10" name="description" class="mobile-textarea relative p-2"
                        style="background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                        type="text" placeholder="Keterangan"></textarea>
                    
                    <label for="editFileInput" class="mobile-label relative max-w-full text-center p-2 cursor-pointer"
                        style="font-size: 14px; font-family: 'Montserrat', sans-serif; font-weight: 400; height: 36px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; display: flex; align-items: center; justify-content: center;">
                        Upload Document
                    </label>
                    <input id="editFileInput" name="document" style="display: none;" type="file">
                
                    <div class="flex justify-between mt-4">
                        <button type="button" data-close-modal="editActivityModal"
                            class="px-4 py-2 text-center rounded-md bg-gray-600 hover:opacity-80 transition flex items-center justify-center text-base text-white font-medium">
                            Close
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-center rounded-md bg-green-600 hover:opacity-80 transition flex items-center justify-center text-base text-white font-medium">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="bgusulan relative w-full px-4 mt-10 md:mt-20" style="z-index: 0;">
        <div class="relative opacity-40" style="border-radius: 36px;">
        </div>
        <img src="{{ asset('img/background.png') }}" class="justify-center items-center m-0 h-64 w-full md:h-96 md:w-2/3 mx-auto"
            style="overflow: scroll; border-radius: 16px; margin-bottom: 0px;">
            <span class="flex justify-center items-center absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center responsive-text"
            style="color: white; font-family: 'Poppins', sans-serif; font-weight: 100p; width: 70%; max-width: 50%; height: 70%; line-height: 1.5;">
            Pengajuan kegiatan oleh penduduk di tingkat RW dan RT dapat mengoptimalkan partisipasi penduduk dalam
            pembangunan lingkungan serta mempercepat respons dan koordinasi dari pihak berwenang.
            </span>

        </div>
</main>

<script>
    function redirectToTambahKegiatanPD() {
        window.location.href = "{{ route('tambahEditKegiatanPD') }}";
    }

    // Ambil modal
    var modal = document.getElementById('myModal');
    // Ambil tombol yang membuka modal
    var btn = document.getElementById("openModal");
    // Ambil span yang menutup modal
    var span = document.getElementsByClassName("close")[0];

    // Ketika tombol diklik, buka modal
    btn.onclick = function() {
        modal.style.display = "auto";
    }

    // Ketika span diklik, tutup modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Ketika pengguna mengklik di luar modal, tutup modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
@endsection
