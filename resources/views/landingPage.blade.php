@extends('layouts.body')
<style>
    .umkm-container {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding: 20px;
            scroll-behavior: smooth;
        }
        .umkm-item {
            flex: 0 0 calc(33.333% - 20px); /* Three items per row minus the gap */
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-sizing: border-box;
            height: 550px; /* Adjusted height */
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .umkm-image {
            width: 100%;
            height: 350px; /* Adjusted height for better appearance */
            background-color: #ddd;
            border-radius: 0;
        }
        .umkm-item h3, .umkm-item p {
            text-align: center;
        }
</style>

<header class="px-9 py-10" style="display: flex; align-items: center; justify-content: space-between;">
    <svg width="52" height="39" viewBox="0 0 52 39" fill="none" xmlns="http://www.w3.org/2000/svg">
        <line x1="4.12695" y1="19.5" x2="4.12695" y2="38.9925" stroke="#385668" stroke-width="4"/>
        <line y1="-2" x2="19.3393" y2="-2" transform="matrix(-0.662751 0.74884 -0.737003 -0.67589 14.8945 5.42188)" stroke="#385668" stroke-width="4"/>
        <line y1="-2" x2="19.356" y2="-2" transform="matrix(-0.625314 0.780373 -0.769364 -0.638811 33.7109 4.36719)" stroke="#385668" stroke-width="4"/>
        <line y1="-2" x2="21.4848" y2="-2" transform="matrix(0.756985 0.653433 -0.640054 0.76833 32.9785 6.50488)" stroke="#385668" stroke-width="4"/>
        <line y1="-2" x2="15.2292" y2="-2" transform="matrix(0.7684 0.63997 -0.626481 0.779437 13.8301 6.50488)" stroke="#385668" stroke-width="4"/>
        <line x1="23.2773" y1="19.5" x2="23.2773" y2="38.9925" stroke="#385668" stroke-width="4"/>
        <line x1="26.5957" y1="22.915" x2="37.234" y2="22.915" stroke="#385668" stroke-width="4"/>
        <line x1="41.8945" x2="41.8945" y2="39" stroke="#385668" stroke-width="4"/>
        <line x1="49.873" y1="19.5" x2="49.873" y2="38.9925" stroke="#385668" stroke-width="4"/>
        <line y1="36.9922" x2="50" y2="36.9922" stroke="#385668" stroke-width="4"/>
    </svg>
    <div class="menu" style="display: flex; justify-content: center; flex-grow: 1;">
        <a class="active" style="margin: 0 15px; font-size:24px; color: #888;" href="#container">Beranda</a>
        <a class="active" style="margin: 0 15px; font-size:24px; color: #888;" href="#what-is-complexhub">Tentang</a>
        <a class="active" style="margin: 0 15px; font-size:24px; color: #888;" href="#umkm">UMKM</a>
        {{-- <p class="active" style="margin: 0 15px; font-size:24px; color: #888;">FAQ</p> --}}
        {{-- <p class="active" style="margin: 0 15px; font-size:24px; color: #888;">Saran</p> --}}
    </div>
    <div class="btn btn-primary" style="background-color: #385668; border-radius: 40px;">
        <a href="{{ route('login') }}"><button style="color: #FBEEC1">Masuk</button></a>
    </div>
</header>
<main>
    <div class="container" style="font-family: Arial, sans-serif; display: flex; overflow: hidden; margin: 20px; flex-wrap: wrap; flex-direction: row; align-items: center;">
        <div class="text" style="flex: 1; margin-right: 350px">
            <h1 style="font-size: 24px; color: #385668; font-weight: 600; font-family: 'Poppins', sans-serif;">ComplexHub - Manajemen Lingkungan</h1>
            <p style="font-size: 40px; color: black; margin-bottom: 20px; font-weight: 600;">Sistem Manajemen untuk mempermudah pengelolaan dalam lingkungan rukun warga</p>
            <p style="font-size: 16px; margin-bottom: 20px;">ComplexHub adalah sebuah website yang menyediakan sistem manajemen warga online untuk mempermudah pengelolaan informasi dan interaksi antarwarga, memungkinkan untuk dilakukan di mana pun dan kapan pun.</p>
            <div class="buttons" style="margin-top: 20px;">
                <a href="{{ route('login') }}"><button class="start-button" style="padding: 10px 20px; margin-right: 10px; border-radius: 5px; background-color: #3b4d61; color: #FBEEC1; font-weight: 600;">Mulai Sekarang</button></a>
                {{-- <button class="how-it-works-button" style="padding: 10px 20px; margin-right: 10px; border-radius: 5px; border: 2px solid #3b4d61; color: #3b4d61; font-weight: 600;">Cara Kerja</button> --}}
            </div>
        </div>
        <img class="image" src="{{ asset('img/gambar landingPage.jpg') }}" alt="" style="flex: 1; width: 100%; max-width: 450px; height: auto; background-size: cover; background-position: right; border-top-left-radius: 100px; border-bottom-left-radius: 10px; border-bottom-right-radius: 100px; border-top-right-radius: 10px;">
    </div>
    

    <section id="what-is-complexhub" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh; margin: 40px 20px; text-align: center;">
        <h2 style="font-size: 36px; color: #385668; font-weight: 600; font-family: 'Poppins', sans-serif;">Apa Itu ComplexHub?</h2>
        <hr style="width: 50%; border: 1px solid #385668; margin: 20px 0;">
        <p style="font-size: 20px; color: black; margin-bottom: 20px; padding-left:15%; padding-right:15%;">ComplexHub adalah sebuah website yang menyediakan sistem manajemen warga online untuk mempermudah pengelolaan informasi dan interaksi antarwarga, memungkinkan untuk dilakukan di mana pun dan kapan pun.</p>
        {{-- <button style="padding: 10px 20px; border-radius: 5px; background-color: #3b4d61; color: #FBEEC1; font-weight: 600;">Baca lebih lanjut</button> --}}
    </section>    

    <section id="umkm" style="margin: 40px 20px;">
        <h2 style="font-size: 36px; color: #385668; font-weight: 600; font-family: 'Poppins', sans-serif; text-align: center;">UMKM</h2>
        <p style="font-size: 20px; text-align:center; color: grey;">Informasi seputar UMKM yang ada di RW 08 Cemorokandang</p>
        <div class="umkm-container">
            @foreach ($izinUsaha as $izin)
                <div class="umkm-item">
                    <img src="{{ asset('storage/' . $izin->foto_produk) }}" alt="" class="umkm-image">
                    <h3 style="font-size: 18px; color: #333; margin-top: 10px;">{{ $izin->nama_usaha }}</h3>
                    <p style="font-size: 14px; color: #666;">{{ $izin->deskripsi }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <footer style="background-color: #2b3e50; color: #FBEEC1; padding: 40px 20px;">
        <div class="footer-container" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
            <div class="footer-column" style="flex: 1; margin: 10px; min-width: 200px;">
                <h3 style="font-size: 36px; color: #FBEEC1; font-weight: 600; font-family: 'Poppins', sans-serif;">ComplexHub</h3>
                <p>RW 08 Kelurahan Cemorokandang<br>Kota Malang, Jawa Timur</p>
                <p><strong>Telepon:</strong> +62 896 8053 3168<br><strong>Email:</strong> ComplexHub@gmail.com</p>
                {{-- <div class="social-icons" style="margin-right: 10px;">
                    <a href="#"><img src="facebook-icon.png" alt="Facebook" style="color: #FBEEC1; text-decoration: none; display: block; margin: 5px 0;"></a>
                    <a href="#"><img src="instagram-icon.png" alt="Instagram"></a>
                    <a href="#"><img src="twitter-icon.png" alt="Twitter"></a>
                </div> --}}
            </div>
            {{-- <div class="footer-column">
                <h3>Link</h3>
                <a href="#">Beranda</a>
                <a href="#">Tentang</a>
                <a href="#">UMKM</a>
                <a href="#">FAQ</a>
                <a href="#">Kontak</a>
            </div> --}}
            <div class="footer-column" style="flex: 1; margin: 10px; min-width: 200px;">
                <h3>Tentang Website</h3>
                <p>ComplexHub adalah sebuah website yang menyediakan sistem manajemen warga online untuk mempermudah pengelolaan informasi dan interaksi antarwarga, memungkinkan untuk dilakukan di mana pun dan kapan pun.</p>
            </div>
        </div>
    </footer>

    <script>
        // Ambil semua elemen menu
        const menuItems = document.querySelectorAll('.menu a');

        // Tambahkan event listener untuk setiap item
        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                // Hapus kelas active dari semua item
                menuItems.forEach(i => i.classList.remove('active'));
                // Tambahkan kelas active ke item yang diklik
                this.classList.add('active');
            });
        });
    </script>

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
</main>
