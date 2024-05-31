@extends('layouts.welcome')
@section('content')
<style>
    #kotakBiru {
        background-color: #659DBD; 
        filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));
        font-family: 'Poppins', sans-serif;
    }

    #kotakBiru:hover {
  background-color: #4d84bd; /* Adjust hover color as desired */
  cursor: pointer; /* Indicate interactivity on hover */
  transform: scale(1.05); /* Enlarge on hover by 5% */
  transition: transform 0.2s ease-in-out; /* Smooth zoom effect */
}
    h6 {
        color: white;
        font-family: 'Poppins', sans-serif;
    }

    /* .umkm-container {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding: 20px;
            scroll-behavior: smooth;
        }
        .umkm-container::-webkit-scrollbar {
        display: none; 
    }
        .umkm-item {
            flex: 0 0 calc(33.333% - 20px); 
            background: #2b3e50;
            padding: 20px;
            border-radius: 10px;
            box-sizing: border-box;
            height: 550px; 
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .umkm-image {
            width: 100%;
            height: 350px; 
            background-color: #ddd;
            border-radius: 0;
        }
        .umkm-item h3, .umkm-item p {
            text-align: center;
        }

        .menu {
            display: flex;
            justify-content: center;
            flex-grow: 1;
        }

        .menu a {
            margin: 0 15px;
            font-size: 24px;
            color: #000;
            text-decoration: none;
            transition: color 0.3s, transform 0.3s;
        }

        .menu a:hover {
            color: #888;
            transform: scale(1.3);
        } */
</style>
<main class="mx-auto" style="min-height: 100vh; background-color: #FBEEC1; padding: 36px; contain: responsive;">
    <div style="height: 60px;"></div>
    <div id="wrapkotak" style="background-color: #FBEEC1; padding: auto; border-radius: 8px; position: relative; top: 32px; left: 16px;">
        <div id="kotak" style="display: flex; flex-wrap: wrap;">
            <div style="flex: 1 1 25%; max-width: 25%; padding: 16px;">
                <div id="kotakBiru" style="border: 1px solid #e3e3e3; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);background-color: #659DBD;">
                    <div style="padding: 16px;">
                        <div style="display: flex; align-items: center; justify-content: start;">
                            <div style="background-color: purple; padding: 8px; border-radius: 50%; margin-bottom: 8px;">
                                <i class="iconly-boldProfile" style="color: white;"></i>
                            </div>
                        </div>
                        <div>
                            <h6 style="font-weight: 600;">RT</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div style="flex: 1 1 25%; max-width: 25%; padding: 16px;">
                <div id="kotakBiru" style="border: 1px solid #e3e3e3; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 16px;">
                        <div style="display: flex; align-items: center; justify-content: start;">
                            <div style="background-color: blue; padding: 8px; border-radius: 50%; margin-bottom: 8px;">
                                <i class="iconly-boldBookmark" style="color: white;"></i>
                            </div>
                        </div>
                        <div>
                            <h6 style="font-weight: 600;">Jumlah Warga</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div style="flex: 1 1 25%; max-width: 25%; padding: 16px;">
                <div id="kotakBiru" style="border: 1px solid #e3e3e3; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 16px;">
                        <div style="display: flex; align-items: center; justify-content: start;">
                            <div style="background-color: green; padding: 8px; border-radius: 50%; margin-bottom: 8px;">
                                <i class="iconly-boldBag" style="color: white;"></i>
                            </div>
                        </div>
                        <div>
                            <h6 style="font-weight: 600;">Total Iuran</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div style="flex: 1 1 25%; max-width: 25%; padding: 16px;">
                <div id="kotakBiru" style="border: 1px solid #e3e3e3; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 16px;">
                        <div style="display: flex; align-items: center; justify-content: start;">
                            <div style="background-color: red; padding: 8px; border-radius: 50%; margin-bottom: 8px;">
                                <i class="iconly-boldProfile" style="color: white;"></i>
                            </div>
                        </div>
                        <div>
                            <h6 style="font-weight: 600;">Kegiatan</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <section id="umkm" style="margin: 40px 20px;" class="relative">
        <h2 style="font-size: 36px; color: #385668; font-weight: 600; font-family: 'Poppins', sans-serif; text-align: center;">UMKM</h2>
        <p style="font-size: 20px; text-align:center; color: grey;">Informasi seputar UMKM yang ada di RW 08 Cemorokandang</p>
        <div class="umkm-container">
            @foreach ($izinUsaha as $izin)
                <div class="umkm-item">
                    <img src="{{ asset('storage/' . $izin->foto_produk) }}" alt="" class="umkm-image">
                    <h3 style="font-size: 18px; color: #FBEEC1; margin-top: 10px;">{{ $izin->nama_usaha }}</h3>
                    <p style="font-size: 14px; color: #FBEEC1;">{{ $izin->deskripsi }}</p>
                </div>
            @endforeach
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.querySelector('.umkm-container');
        const items = Array.from(document.querySelectorAll('.umkm-item'));
        let currentIndex = 0;

        function cloneItems() {
            items.forEach(item => {
                const clone = item.cloneNode(true);
                container.appendChild(clone);
            });
        }

        function startScrolling() {
            setInterval(() => {
                currentIndex++;
                if (currentIndex >= items.length) {
                    container.scrollTo({ left: 0, behavior: 'smooth' });
                    currentIndex = 0;
                } else {
                    const scrollAmount = container.clientWidth / 3 + 20; // Width of one item + gap
                    container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                }
            }, 2000);
        }

        cloneItems();
        startScrolling();
    });
</script>
@endsection
