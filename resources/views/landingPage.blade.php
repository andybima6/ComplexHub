@extends('layouts.body')
<style>
    #landing-container {
        font-family: Arial, sans-serif;
        display: flex;
        overflow: hidden;
        margin: auto;
        flex-wrap: wrap;
        flex-direction: row;
        align-items: center;
        justify-content: flex-end;
        /* Align content to the right */
        padding-right: 50px;
        /* Add padding to push content further right */
    }

    #landing-container .text {
        flex: 1;
        margin-right: 50px;
    }

    #landing-container h1 {
        font-size: 24px;
        color: #385668;
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
    }

    #landing-container p:first-of-type {
        font-size: 40px;
        color: black;
        margin-bottom: 20px;
        font-weight: 600;
    }

    #landing-container p {
        font-size: 16px;
        margin-bottom: 20px;
    }

    #landing-container .buttons {
        margin-top: 20px;
    }

    #landing-container .start-button {
        padding: 10px 20px;
        margin-right: 10px;
        border-radius: 5px;
        background-color: #3b4d61;
        color: #FBEEC1;
        font-weight: 600;
        border: none;
    }

    #landing-container .image {
        flex: 1;
        width: 100%;
        max-width: 450px;
        height: auto;
        background-size: cover;
        background-position: right;
        border-top-left-radius: 100px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 100px;
        border-top-right-radius: 10px;
    }

    #login-landing {
        border: none;
        outline: none;
        padding: 8px 16px;
        font-family: "Poppins", sans-serif;
        font-size: 16px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s ease-in-out;
        background-color: rgba(56, 86, 104, 1);
        color: #FBEEC1;
    }

    #login-landing:hover {
        background-color: #FBEEC1;
        border: 1px solid rgba(56, 86, 104, 1);
        color: rgba(56, 86, 104, 1);
    }

    #mulai-landing2 {
        border: none;
        outline: none;
        padding: 8px 16px;
        font-family: "Poppins", sans-serif;
        font-size: 16px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s ease-in-out;
        background-color: rgba(56, 86, 104, 1);
        color: #FBEEC1;
    }

    #mulai-landing2:hover {
        background-color: #FBEEC1;
        border: 1px solid rgba(56, 86, 104, 1);
        color: rgba(56, 86, 104, 1);
    }

    .umkm-container {
        display: flex;
        overflow-x: auto;
        gap: 20px;
        padding: 20px;
        scroll-behavior: smooth;
    }

    .umkm-container::-webkit-scrollbar {
        display: none;
        /* Webkit browsers */
    }

    .umkm-item {
        flex: 0 0 calc(33.333% - 20px);
        /* Three items per row minus the gap */
        background: #2b3e50;
        padding: 20px;
        border-radius: 10px;
        box-sizing: border-box;
        height: 550px;
        /* Adjusted height */
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .umkm-image {
        width: 100%;
        height: 350px;
        /* Adjusted height for better appearance */
        background-color: #ddd;
        border-radius: 0;
    }

    .umkm-item h3,
    .umkm-item p {
        text-align: center;
    }

    /* .menu {
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
        }
        .menu {
    display: flex;
    justify-content: center;
    flex-grow: 1;
}

.menu a {
    margin: 0 10px;
    font-size: 24px;
    color: #000000;
} */

    .menu {
        display: flex;
        justify-content: center;
        flex-grow: 1;
    }

    .menu a {
        margin: 0 10px;
        font-size: 24px;
        color: #000000;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .menu a:hover {
        color: #385668;
        /* Warna berubah saat dihover */
    }

    .menu a.active {
        font-weight: bold;
        /* Memberi penekanan pada menu aktif */
    }

    /* Tambahkan animasi saat menu aktif */
    .menu a.active::after {
        content: '';
        display: block;
        width: 0;
        height: 2px;
        background-color: #385668;
        transition: width 0.3s ease;
    }

    .menu a.active:hover::after {
        width: 100%;
        /* Animasi lebar saat dihover */
    }

    /* Animasi efek underline saat menu dihover */
    .menu a:hover::after {
        content: '';
        display: block;
        width: 100%;
        height: 2px;
        background-color: #385668;
        transition: width 0.3s ease;
    }

    /* Animasi efek underline saat menu aktif */
    .menu a.active::after {
        content: '';
        display: block;
        width: 100%;
        height: 2px;
        background-color: #385668;
        transition: width 0.3s ease;
    }

    #login-landing {
        text-align: center;
    }

    .bg-custom {
        background-image: url('{{ asset('img/pemandangan2.jpg') }}');
    }

    /* Media Query untuk tampilan pada perangkat mobile */
    @media screen and (max-width: 600px) {
        .menu {
            flex-direction: column;
            align-items: center;
        }

        .container {
            justify-items: center;
            /* Tengahkan item */
            padding: 10%;
        }

        .container p {
            font-size: 10px;
        }
    }
</style>

<nav class="fixed w-full z-20 top-0 start-0 border-b border-gray-200" style="background-color: #FBEEC1;">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <svg width="52" height="39" viewBox="0 0 52 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="4.12695" y1="19.5" x2="4.12695" y2="38.9925" stroke="#385668" stroke-width="4" />
                <line y1="-2" x2="19.3393" y2="-2"
                    transform="matrix(-0.662751 0.74884 -0.737003 -0.67589 14.8945 5.42188)" stroke="#385668"
                    stroke-width="4" />
                <line y1="-2" x2="19.356" y2="-2"
                    transform="matrix(-0.625314 0.780373 -0.769364 -0.638811 33.7109 4.36719)" stroke="#385668"
                    stroke-width="4" />
                <line y1="-2" x2="21.4848" y2="-2"
                    transform="matrix(0.756985 0.653433 -0.640054 0.76833 32.9785 6.50488)" stroke="#385668"
                    stroke-width="4" />
                <line y1="-2" x2="15.2292" y2="-2"
                    transform="matrix(0.7684 0.63997 -0.626481 0.779437 13.8301 6.50488)" stroke="#385668"
                    stroke-width="4" />
                <line x1="23.2773" y1="19.5" x2="23.2773" y2="38.9925" stroke="#385668" stroke-width="4" />
                <line x1="26.5957" y1="22.915" x2="37.234" y2="22.915" stroke="#385668" stroke-width="4" />
                <line x1="41.8945" x2="41.8945" y2="39" stroke="#385668" stroke-width="4" />
                <line x1="49.873" y1="19.5" x2="49.873" y2="38.9925" stroke="#385668" stroke-width="4" />
                <line y1="36.9922" x2="50" y2="36.9922" stroke="#385668" stroke-width="4" />
            </svg>
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900"
                style="font-family: 'Poppins', sans-serif;">ComplexHub</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a href="{{ route('login') }}">
                <button id="login-landing"
                    class="text-white bg-[#385668] hover:bg-[#2c4452] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Masuk
                </button>
            </a>
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-[#FBEEC1]">
                <li>
                    <a href="#container"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#385668] md:p-0">Beranda</a>
                </li>
                <li>
                    <a href="#what-is-complexhub"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#385668] md:p-0">Tentang</a>
                </li>
                <li>
                    <a href="#umkm"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#385668] md:p-0">UMKM</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    document.querySelector('[data-collapse-toggle]').addEventListener('click', function() {
        const target = document.getElementById(this.getAttribute('data-collapse-toggle'));
        target.classList.toggle('hidden');
    });
</script>
<main>
    <section class="bg-center bg-no-repeat bg-gray-700 bg-blend-multiply bg-custom">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                ComplexHub - Manajemen Lingkungan</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Sistem Manajemen untuk
                mempermudah pengelolaan dalam lingkungan rukun warga.</p>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">ComplexHub adalah sebuah
                website yang menyediakan sistem manajemen warga online untuk mempermudah pengelolaan informasi dan
                interaksi antarwarga, memungkinkan untuk dilakukan di mana pun dan kapan pun.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{ route('login') }}" id="mulai-landing2"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Mulai Sekarang
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
    {{-- <div id="landing-container" class="container">
    <div class="text">
        <h1>ComplexHub - Manajemen Lingkungan</h1>
        <p>Sistem Manajemen untuk mempermudah pengelolaan dalam lingkungan rukun warga</p>
        <p>ComplexHub adalah sebuah website yang menyediakan sistem manajemen warga online untuk mempermudah pengelolaan informasi dan interaksi antarwarga, memungkinkan untuk dilakukan di mana pun dan kapan pun.</p>
        <div id="mulai-landing2" class="btn btn-primary">
            <a href="{{ route('login') }}"><button class="start-button">Mulai Sekarang</button></a>
        </div>
    </div>
    <img class="image" src="{{ asset('img/gambar landingPage.jpg') }}" alt="">
</div> --}}


    <section id="what-is-complexhub"
        style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 55vh; margin: 40px 20px; text-align: center;">
        <h2 style="font-size: 36px; color: #385668; font-weight: 600; font-family: 'Poppins', sans-serif;">Apa Itu
            ComplexHub?</h2>
        <hr style="width: 50%; border: 1px solid #385668; margin: 20px 0;">
        <p style="font-size: 20px; color: black; margin-bottom: 20px; padding-left:15%; padding-right:15%;">ComplexHub
            adalah sebuah website yang menyediakan sistem manajemen warga online untuk mempermudah pengelolaan informasi
            dan interaksi antarwarga, memungkinkan untuk dilakukan di mana pun dan kapan pun.</p>
        {{-- <button style="padding: 10px 20px; border-radius: 5px; background-color: #3b4d61; color: #FBEEC1; font-weight: 600;">Baca lebih lanjut</button> --}}
    </section>

    <section id="umkm" style="margin: 40px 20px;" class="relative">
        <h2
            style="font-size: 36px; color: #385668; font-weight: 600; font-family: 'Poppins', sans-serif; text-align: center;">
            UMKM</h2>
        <p style="font-size: 20px; text-align:center; color: grey;">Informasi seputar UMKM yang ada di RW 08
            Cemorokandang</p>
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


    <section class="py-10 sm:py-16 lg:py-24">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="max-w-2xl mx-auto text-center">
                <p class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">
                    Pertanyaan seputar ComplexHub
                </p>
            </div>
            <div class="max-w-3xl mx-auto mt-8 space-y-4 md:mt-16">
                <div style="background-color: #2b3e50"
                    class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question1" data-state="closed"
                        class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                        <span style="color: #FBEEC1;" class="flex text-lg font-semibold">Apa itu ComplexHub?</span>
                        <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-6 h-6 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="answer1" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                        <p style="color: #FBEEC1;">Sistem Informasi Lingkungan RT/RW adalah platform berbasis aplikasi
                            dan website yang dirancang untuk memfasilitasi manajemen lingkungan di tingkat Rukun
                            Tetangga (RT) dan Rukun Warga (RW). Sistem ini mencakup berbagai fitur untuk pelaporan
                            masalah lingkungan, pengelolaan data warga, serta koordinasi kegiatan komunitas.</p>
                    </div>
                </div>
                <div style="background-color: #2b3e50"
                    class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question2" data-state="closed"
                        class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                        <span style="color: #FBEEC1;" class="flex text-lg font-semibold">Mengapa penting memiliki
                            Sistem Informasi Lingkungan di tingkat RT/RW?
                        </span>
                        <svg id="arrow2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-6 h-6 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="answer2" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                        <p style="color: #FBEEC1;">Memiliki sistem informasi lingkungan di tingkat RT/RW membantu
                            meningkatkan efisiensi dalam manajemen lingkungan, mempermudah komunikasi antar warga, dan
                            mempercepat respon terhadap masalah lingkungan seperti kebersihan, sampah, dan lainnya.</p>
                    </div>
                </div>
                <div style="background-color: #2b3e50"
                    class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question3" data-state="closed"
                        class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                        <span style="color: #FBEEC1;" class="flex text-lg font-semibold">Bagaimana cara melaporkan masalah lingkungan melalui aplikasi?
                        </span>
                        <svg id="arrow3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-6 h-6 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="answer3" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                        <p style="color: #FBEEC1;">Pengguna dapat melaporkan masalah lingkungan dengan membuka fitur pelaporan di aplikasi, mengisi form yang tersedia, dan mengunggah foto atau video terkait masalah yang dilaporkan.</p>
                    </div>
                </div>
                <div style="background-color: #2b3e50"
                    class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question4" data-state="closed"
                        class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                        <span style="color: #FBEEC1;" class="flex text-lg font-semibold">Apakah aplikasi ini gratis digunakan?</span>
                        <svg id="arrow4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-6 h-6 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="answer4" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                        <p style="color: #FBEEC1;"> Ya, aplikasi ini dapat digunakan secara gratis oleh seluruh warga yang terdaftar di lingkungan RT/RW yang sudah menggunakan sistem ini.</p>
                    </div>
                </div>
            </div>
            <p class="text-center text-gray-600 textbase mt-9" style="color: #FBEEC1;">
                Still have questions?
                <span
                    class="cursor-pointer font-medium text-tertiary transition-all duration-200 hover:text-tertiary focus:text-tertiary hover-underline"
                    style="color: #FBEEC1;">Contact
                    our support
                </span>
            </p>
        </div>
        <script>
            // JavaScript to toggle the answers and rotate the arrows
            document.querySelectorAll('[id^="question"]').forEach(function(button, index) {
                button.addEventListener('click', function() {
                    var answer = document.getElementById('answer' + (index + 1));
                    var arrow = document.getElementById('arrow' + (index + 1));

                    if (answer.style.display === 'none' || answer.style.display === '') {
                        answer.style.display = 'block';
                        arrow.style.transform = 'rotate(0deg)';
                    } else {
                        answer.style.display = 'none';
                        arrow.style.transform = 'rotate(-180deg)';
                    }
                });
            });
        </script>
    </section>


    <footer style="background-color: #2b3e50; color: #FBEEC1; padding: 40px 20px;">
        <div class="footer-container" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
            <div class="footer-column" style="flex: 1; margin: 10px; min-width: 200px;">
                <h3 style="font-size: 36px; color: #FBEEC1; font-weight: 600; font-family: 'Poppins', sans-serif;">
                    ComplexHub</h3>
                <p>RW 08 Kelurahan Cemorokandang<br>Kota Malang, Jawa Timur</p>
                <p><strong>Telepon:</strong> 911<br><strong>Email:</strong> andybima6@gmail.com</p>
                <div class="social-icons" style="margin-right: 10px;">
                    <a href="https://www.facebook.com/andy.bima.902">
                        <img src="facebook-icon.png" alt="Facebook"
                            style="color: #FBEEC1; text-decoration: none; display: block; margin: 5px 0;">
                    </a>
                    <a href="https://www.instagram.com/andybima_/"><img src="instagram-icon.png" alt="Instagram"></a>
                    <a href="https://x.com/Andynugrahaput1"><img src="twitter-icon.png" alt="Twitter"></a>
                </div>
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
                <p>ComplexHub adalah sebuah website yang menyediakan sistem manajemen warga online untuk mempermudah
                    pengelolaan informasi dan interaksi antarwarga, memungkinkan untuk dilakukan di mana pun dan kapan
                    pun.</p>
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
                        container.scrollTo({
                            left: 0,
                            behavior: 'smooth'
                        });
                        currentIndex = 0;
                    } else {
                        const scrollAmount = container.clientWidth / 3 + 20; // Width of one item + gap
                        container.scrollBy({
                            left: scrollAmount,
                            behavior: 'smooth'
                        });
                    }
                }, 2000);
            }

        // cloneItems();
        startScrolling();
    });
</script>
</main>
