@extends('layouts.body')
<style>
    .menu p.active {
            color: black;
        }
        .menu p:hover:not(.active) {
            color: #555; /* Slightly darker grey for hover on non-active items */
        }
        .menu p {
            margin: 0 15px;
            font-size: 24px;
            cursor: pointer;
            color: #888; /* Default color for non-active items */
            transition: color 0.3s;
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
        <p class="active" style="margin: 0 15px; font-size:24px; color: #888;">Beranda</p>
        <p class="active" style="margin: 0 15px; font-size:24px; color: #888;">Tentang</p>
        <p class="active" style="margin: 0 15px; font-size:24px; color: #888;">UMKM</p>
        <p class="active" style="margin: 0 15px; font-size:24px; color: #888;">FAQ</p>
        <p class="active" style="margin: 0 15px; font-size:24px; color: #888;">Saran</p>
    </div>
    <div class="btn btn-primary" style="background-color: #385668; border-radius: 40px;">
        <button style="color: #FBEEC1">Masuk</button>
    </div>
</header>
<main>
    <div class="container" style="font-family: Arial, sans-serif; display: flex; overflow: hidden; margin: 20px;">
        <div class="text" style="flex: 1; margin-right: 350px">
            <h1 style="font-size: 24px; color: #385668; font-weight: 600; font-family: 'Poppins', sans-serif;">ComplexHub - Manajemen Lingkungan</h1>
            <p style="font-size: 40px; color: black; margin-bottom: 20px; font-weight: 600;">Sistem Manajemen untuk mempermudah pengelolaan dalam lingkungan rukun warga</p>
            <p style="font-size: 16px; margin-bottom: 20px;">ComplexHub adalah sebuah website yang menyediakan sistem manajemen warga online untuk mempermudah pengelolaan informasi dan interaksi antarwarga, memungkinkan untuk dilakukan di mana pun dan kapan pun.</p>
            <div class="buttons" style="margin-top: 20px;">
                <button class="start-button" style="padding: 10px 20px; margin-right: 10px; border-radius: 5px; background-color: #3b4d61; color: #FBEEC1; font-weight: 600;">Mulai Sekarang</button>
                <button class="how-it-works-button" style="padding: 10px 20px; margin-right: 10px; border-radius: 5px; border: 2px solid #3b4d61; color: #3b4d61; font-weight: 600;">Cara Kerja</button>
            </div>
        </div>
        <div class="image" style="flex: 1; background-image: url('img/gambar landingPage.jpg'); background-size: cover; background-position: right; border-top-left-radius: 100px; border-bottom-right-radius: 100px;"></div>
    </div>
    <script>
        // Ambil semua elemen menu
        const menuItems = document.querySelectorAll('.menu p');

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
</main>
