@extends('layouts.welcome')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.js" integrity="sha512-qiVW4rNFHFQm0jHli5vkdEwP4GPSzCSp85J7JRHdgzuuaTg31tTMC8+AHdEC5cmyMFDByX639todnt6cxEc1lQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.css" integrity="sha512-LJwWs3xMbOQNFpWVlpR0Dv3ND8TQgLzvBJsfjMcPKax6VJQ8p9WnQvB5J5Lb9/0D31cbnNsh9x5Lz6+mzxgw1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconly@2.3.0/dist/iconly.min.css">

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    /* Main container for charts */
    .charts2 {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 0 auto;
        max-width: 1200px;
        padding: 16px;
    }

    /* Individual chart containers */
    .chart2, .carouselUMKM {
        flex: 1;
        margin: 16px;
    }

    /* Chart and UMKM container specific styles */
    .chart2 {
        align-items: flex-start;
    }

    .carouselUMKM {
        align-items: flex-end;
    }

    /* Chart Iuran specific styles */
    #chartIuran {
        max-width: 50%;
        width: auto;
        height: auto;
        float: left;
    }

    /* Carousel styles */
    .carousel {
        display: flex;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        padding: 16px;
    }

    .carouselUMKM {
        margin: 0 auto;
        max-width: 1200px;
        overflow: hidden;
    }

    .carousel-item {
        scroll-snap-align: center;
        flex: 0 0 auto;
        width: 300px;
        margin-right: 1rem;
        border-radius: 0.5rem;
    }

    .carousel-item img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: inherit;
    }

    .carousel-item:hover,
    .carousel-item:focus {
        opacity: 0.8;
        cursor: pointer;
    }

    .carousel::-webkit-scrollbar {
        width: 10px;
        background-color: transparent;
    }

    .carousel::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    .carousel {
        scrollbar-width: thin;
        scrollbar-color: transparent transparent;
    }

    /* Kotak styles */
    #wrapkotak {
        background-color: #FBEEC1;
        padding: 16px;
        border-radius: 8px;
        position: relative;
        top: 32px;
        left: 16px;
        max-width: 100%;
    }

    #kotak {
        display: flex;
        flex-wrap: wrap;
    }

    .kotak-item {
        flex: 1 1 25%;
        max-width: 25%;
        padding: 16px;
    }

    .kotak-content {
        border: 1px solid #e3e3e3;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 24px;
    }

    .icon-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .text-container {
        display: flex;
        align-items: center;
        justify-content: left;
    }

    .text-container h5 {
        font-weight: 600;
        color: white;
        margin-left: 10px;
    }

    /* Kotak responsiveness */
    @media (max-width: 768px) {
        .kotak-item {
            flex: 1 1 50%;
            max-width: 50%;
        }

        .charts2 {
            flex-direction: column;
            align-items: center;
        }
    }

    @media (max-width: 480px) {
        .kotak-item {
            flex: 1 1 100%;
            max-width: 100%;
        }

        .charts2 {
            flex-direction: column;
            align-items: center;
        }
    }

    .charts {
        display: flex;
        justify-content: center;
        padding: 20px;
    }    .charts {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .chart {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    h2 {
        font-size: 36px;
        color: #385668;
        font-weight: 600;
    }

    p {
        font-size: 20px;
        color: grey;
    }

    #chart {
        max-width: 800px;
        margin: 0 auto;
    }

    @media (max-width: 768px) {
        .charts2 {
            flex-direction: column;
            padding: 10px;
        }

        h2 {
            font-size: 28px;
        }

        p {
            font-size: 18px;
        }

        .chart {
            max-width: 100%;
        }

        #chart {
            max-width: 100%;
        }
    }

    /* Hover effect for kotakBiru */
    .kotak-content {
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .kotak-content:hover {
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
    }

    .kotak-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.2);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .kotak-content:hover::before {
        opacity: 1;
    }

    .kotak-content h5 {
        transition: color 0.3s ease;
    }

    .kotak-content:hover h5 {
        color:; /* Mengubah warna teks saat hover */
    }

    .iconly-boldShop, .iconly-boldMessage {
        display: block;
        margin-bottom: 16px;
    }
</style>

<main class="mx-auto" style="min-height: 15%; background-color: #FBEEC1; padding: 36px; contain: responsive;">
    
    <div style="height: 60px;"></div>
    <div id="wrapkotak">
        <div id="kotak">
            <div class="kotak-item">
                <div class="kotak-content" style="background-color: #4A90E2;">
                    <div class="icon-container">
                        <i class="iconly-boldShop" style="font-size: 40px; color: white;"></i>
                    </div>
                    <div class="text-container">
                        <svg id="Icons_User" overflow="hidden" version="1.1" viewBox="0 0 96 96" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40">
                            <g fill="white">
                                <circle cx="48" cy="30" r="16"/>
                                <path d="M 80 82 L 80 66 C 80 63.6 78.8 61.2 76.8 59.6 C 72.4 56 66.8 53.6 61.2 52 C 57.2 50.8 52.8 50 48 50 C 43.6 50 39.2 50.8 34.8 52 C 29.2 53.6 23.6 56.4 19.2 59.6 C 17.2 61.2 16 63.6 16 66 L 16 82 L 80 82 Z"/>
                            </g>
                        </svg>
                        <h5>RT : </h5>
                    </div>
                </div>
            </div>
            <div class="kotak-item">
                <div class="kotak-content" style="background-color: #50E3C2;">
                    <div class="icon-container">
                        <i class="iconly-boldShop" style="font-size: 40px; color: white;"></i>
                    </div>
                    <div class="text-container">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 85.988 85.987" style="enable-background:new 0 0 85.988 85.987;" xml:space="preserve">
                            <g>
                                <path style="fill:white;" d="M77.993,30.884c-2.692,0-4.878,2.185-4.878,4.868c0,2.685,2.186,4.867,4.878,4.867c2.683,0,4.867-2.183,4.867-4.867C82.86,33.069,80.675,30.884,77.993,30.884z M8.005,30.884c-2.692,0-4.878,2.185-4.878,4.868c0,2.685,2.186,4.867,4.878,4.867c2.685,0,4.87-2.183,4.87-4.867C12.875,33.069,10.69,30.884,8.005,30.884z M63.504,22.03c-3.997,0-7.239,3.25-7.239,7.25c0,3.992,3.242,7.236,7.239,7.236c3.998,0,7.25-3.244,7.25-7.236C70.754,25.284,67.502,22.03,63.504,22.03z M85.988,66.088h-8.254V50.896c0-2.61-0.767-5.033-1.999-7.146c0.726-0.212,1.471-0.363,2.258-0.363c4.401,0,7.995,3.594,7.995,8.006V66.088z M22.483,22.03c-4,0-7.25,3.25-7.25,7.25c0,3.992,3.25,7.236,7.25,7.236c3.987,0,7.237-3.244,7.237-7.236C29.72,25.284,26.471,22.03,22.483,22.03z M8.005,43.387c0.787,0,1.522,0.15,2.25,0.363c-1.245,2.113-1.999,4.536-1.999,7.146v15.192H0V51.393C0,46.98,3.596,43.387,8.005,43.387z M42.986,7.555c-5.9,0-10.71,4.805-10.71,10.711c0,5.905,4.805,10.716,10.71,10.716c5.906,0,10.717-4.811,10.717-10.716C53.708,12.359,48.892,7.555,42.986,7.555z M75.083,71.742H62.438V48.627c0-3.179-0.839-6.136-2.195-8.787c1.035-0.306,2.123-0.523,3.262-0.523c6.38,0,11.578,5.188,11.578,11.579V71.742z M23.537,48.627v23.115H10.908V50.896c0-6.385,5.191-11.579,11.581-11.579c1.139,0,2.216,0.217,3.249,0.523C24.381,42.491,23.537,45.448,23.537,48.627z M26.188,78.433h33.598V48.627c0-9.264-7.539-16.798-16.801-16.798c-9.269,0-16.797,7.534-16.797,16.798V78.433z"/>
                            </g>
                        </svg>
                        <h5>Jumlah Warga : </h5>
                    </div>
                </div>
            </div>
            <div class="kotak-item">
                <div class="kotak-content" style="background-color: #E94E77;">
                    <div class="icon-container">
                        <i class="iconly-boldShop" style="font-size: 40px; color: white;"></i>
                    </div>
                    <div class="text-container">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="40px" height="40px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                           <g>
                               <path fill="#FFFFFF" d="M256,0C114.625,0,0,114.625,0,256s114.625,256,256,256c141.406,0,256-114.625,256-256S397.406,0,256,0z 
                                   M325.812,354.844c-12.594,14.125-30.78,22.438-54.562,24.938V416h-30.313v-36.031c-39.656-4.062-64.188-27.125-73.656-69.125
                                   l46.875-12.219c4.344,26.406,18.719,39.594,43.125,39.594c11.406,0,19.844-2.812,25.219-8.469s8.062-12.469,8.062-20.469
                                   c0-8.281-2.688-14.563-8.062-18.813c-5.375-4.28-17.344-9.688-35.875-16.25c-16.656-5.78-29.688-11.469-39.063-17.155
                                   c-9.375-5.625-17-13.531-22.844-23.688c-5.844-10.188-8.781-22.063-8.781-35.563c0-17.719,5.25-33.688,15.688-47.875
                                   c10.438-14.156,26.875-22.813,49.313-25.969V96h30.313v27.969c33.875,4.063,55.813,23.219,65.781,57.5l-41.75,17.125
                                   c-8.156-23.5-20.72-35.25-37.781-35.25c-8.563,0-15.438,2.625-20.594,7.875c-5.188,5.25-7.781,11.625-7.781,19.094
                                   c0,7.625,2.5,13.469,7.5,17.563c4.969,4.063,15.688,9.094,32.063,15.125c18,6.563,32.125,12.781,42.344,18.625
                                   c10.25,5.844,18.406,13.938,24.531,24.219c6.094,10.313,9.155,22.345,9.155,36.126C344.719,323.125,338.406,340.75,325.812,354.844z"/>
                                </g>
                            </svg>
                        <h5>Iuran : </h5>
                    </div>
                </div>
            </div>
            <div class="kotak-item">
                <div class="kotak-content" style="background-color: #F5A623;">
                    <div class="icon-container">
                        <i class="iconly-boldShop" style="font-size: 40px; color: white;"></i>
                    </div>
                    <div class="text-container">
                        <svg width="40px" height="40px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>Iconly/Light-Outline/Activity</title>
                            <g id="Iconly/Light-Outline/Activity" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Activity" transform="translate(2.000000, 2.000000)" fill="#FFFFFF">
                                    <path d="M12.8969,0.8421 C13.3109,0.8421 13.6469,1.1781 13.6469,1.5921 C13.6469,2.0061 13.3109,2.3421 12.8969,2.3421 L5.6289,2.3421 C3.1209,2.3421 1.4999,4.0661 1.4999,6.7361 L1.4999,14.8181 C1.4999,17.5231 3.0819,19.2031 5.6289,19.2031 L14.2329,19.2031 C16.7409,19.2031 18.3619,17.4821 18.3619,14.8181 L18.3619,7.7791 C18.3619,7.3651 18.6979,7.0291 19.1119,7.0291 C19.5259,7.0291 19.8619,7.3651 19.8619,7.7791 L19.8619,14.8181 C19.8619,18.3381 17.5999,20.7031 14.2329,20.7031 L5.6289,20.7031 C2.2619,20.7031 -0.0001,18.3381 -0.0001,14.8181 L-0.0001,6.7361 C-0.0001,3.2111 2.2619,0.8421 5.6289,0.8421 L12.8969,0.8421 Z M15.0123,7.6719 C15.3403,7.9259 15.4003,8.3969 15.1463,8.7239 L12.2163,12.5039 C12.0943,12.6619 11.9143,12.7649 11.7163,12.7889 C11.5163,12.8159 11.3183,12.7579 11.1603,12.6349 L8.3423,10.4209 L5.8113,13.7099 C5.6633,13.9019 5.4413,14.0029 5.2163,14.0029 C5.0563,14.0029 4.8953,13.9519 4.7593,13.8479 C4.4313,13.5949 4.3693,13.1239 4.6223,12.7959 L7.6153,8.9059 C7.7373,8.7469 7.9183,8.6439 8.1163,8.6189 C8.3183,8.5929 8.5163,8.6489 8.6733,8.7739 L11.4933,10.9889 L13.9603,7.8059 C14.2143,7.4769 14.6843,7.4159 15.0123,7.6719 Z M17.9673,2.7533531e-14 C19.4413,2.7533531e-14 20.6393,1.198 20.6393,2.672 C20.6393,4.146 19.4413,5.345 17.9673,5.345 C16.4943,5.345 15.2953,4.146 15.2953,2.672 C15.2953,1.198 16.4943,2.7533531e-14 17.9673,2.7533531e-14 Z M17.9673,1.5 C17.3213,1.5 16.7953,2.025 16.7953,2.672 C16.7953,3.318 17.3213,3.845 17.9673,3.845 C18.6133,3.845 19.1393,3.318 19.1393,2.672 C19.1393,2.025 18.6133,1.5 17.9673,1.5 Z" id="Combined-Shape"></path>
                                </g>
                            </g>
                        </svg>
                        <h5>Jumlah Kegiatan : </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br>

    
    <div class="charts" style="display: flex; justify-content: center;">
        <div class="chart md:max-w-lg">
            <h2 style="font-size: 36px; color: #385668; font-weight: 600; font-family: 'Poppins', sans-serif; text-align: center;">Jumlah Warga</h2>
        <p style="font-size: 20px; text-align:center; color: grey;">Informasi Total Jumlah Warga Setiap RTnya</p><br>
            <div id="chart" style="max-width: 800px; margin: 0 auto;"></div>
        </div>
    </div>
    <br><br><br><br><br>
    <div class="charts2">
        <div class="chart2">
            <h2>Jumlah Iuran</h2>
            <p>Chart Iuran Warga setiap bulan</p>
            <div id="chartIuran"></div>
        </div>
    
        <div class="carouselUMKM">
            <h2>UMKM WARGA</h2>
            <p>Informasi UMKM yang blabla</p>
            <div class="carousel carousel-center max-w-md p-4 space-x-4 bg-neutral rounded-box">
                @foreach ($izinUsaha as $izin)
                    <div class="carousel-item">
                        <img src="{{ asset('storage/' . $izin->foto_produk) }}" alt="" class="rounded-box">
                        {{-- <h3>{{ $izin->nama_usaha }}</h3> --}}
                        {{-- <p>{{ $izin->deskripsi }}</p> --}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <div id="wrapkotak2" style="padding: 40px; border-radius: 12px; position: relative; top: 32px; left: 16px;">
        <div id="kotak" style="display: flex; flex-wrap: wrap; justify-content: center;">
            <div class="kotak-item">
                <div class="kotak-content" style="background-color: #3F51B5;">
                    <div class="icon-container">
                        <i class="iconly-boldShop" style="font-size: 40px; color: white;"></i>
                    </div>
                    <div class="text-container">
                        <svg version="1.1" id="_x31_-outline-expand" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64; width: 40px; height: 40px;" xml:space="preserve">
                        <path style="fill:#ffffff;" d="M57,21h-2v8h2c2.209,0,4-1.791,4-4v0C61,22.791,59.209,21,57,21z"/>
                        <path style="fill:#ffffff;" d="M45,44.12c-2.41,1.2-5.12,1.88-8,1.88s-5.59-0.68-8-1.88c-5.36-2.66-9.2-7.91-9.89-14.12h35.78
                            C54.2,36.21,50.36,41.46,45,44.12z"/>
                        <path style="fill:#ffffff;" d="M55,20v1c-3.31,0-6-2.69-6-6v-1H21.21c-0.33,0-0.67-0.03-0.99-0.08c-0.05-0.01-0.1-0.01-0.14-0.02
                            c-2.54-0.46-4.65-2.42-5.02-5.03c-0.48-3.42,1.93-6.38,5.14-6.81C20.63,3.19,21.72,4,23,4h16C47.84,4,55,11.16,55,20z"/>
                        <circle style="fill:#ffffff;" cx="30" cy="25" r="2"/>
                        <circle style="fill:#ffffff;" cx="44" cy="25" r="2"/>
                        <path style="fill:#ffffff;" d="M37,54.861l9.363-5.107C45.523,49.011,45,47.936,45,46.75v-0.425C42.549,47.396,39.846,48,37,48
                            s-5.549-0.604-8-1.675v0.425c0,1.186-0.523,2.261-1.363,3.004L37,54.861z"/>
                        <polygon style="fill:#ffffff;" points="25.329,50.773 23.714,51.114 19,55.828 19,61 36,61 36,56.593 "/>
                        <path style="fill:#ffffff;" d="M3,35c1.105,0,2,0.895,2,2c0-1.105,0.895-2,2-2s2,0.895,2,2c0-1.105,0.895-2,2-2s2,0.895,2,2V27
                            c0-1.105,0.895-2,2-2s2,0.895,2,2v19h1v-2c0-2.209,1.791-4,4-4v10l-5,5v6H1V37C1,35.895,1.895,35,3,35z"/>
                        <path style="fill:#ffffff;" d="M63,55.382c-0.042-0.039-0.078-0.084-0.12-0.122c-1.42-1.26-3.16-2.16-5.07-2.56l-9.139-1.927
                            L38,56.593V61h25V55.382z M56,59H43v-3h13V59z"/>
                    </svg>
                        <h5>Saran dan pengaduan : 6</h5>
                    </div>
                </div>
            </div>
            <div class="kotak-item">
                <div class="kotak-content" style="background-color: #2196F3;">
                    <div class="icon-container">
                        <i class="iconly-boldShop" style="font-size: 40px; color: white;"></i>
                    </div>
                    <div class="text-container">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="40px" height="40px" viewBox="0 0 512.013 512.014" style="enable-background:new 0 0 512.013 512.014;"xml:space="preserve">
                            <g fill="white">
                                <path d="M31.972,256.007c10.344,0,20.469-5,26.656-14.25l6.875-10.313c3.438,13.969,15.469,24.563,30.5,24.563
                                        c17.688,0,32-14.313,32-32c0,17.688,14.313,32,32,32s32-14.313,32-32c0,17.688,14.313,32,32,32s32-14.313,32-32
                                        c0,17.688,14.312,32,32,32c17.687,0,32-14.313,32-32c0,17.688,14.312,32,32,32s32-14.313,32-32c0,17.688,14.312,32,32,32
                                        c15.062,0,27.062-10.594,30.5-24.563l6.875,10.313c6.156,9.25,16.312,14.25,26.656,14.25c6.094,0,12.25-1.75,17.719-5.375
                                        c14.719-9.813,18.688-29.688,8.875-44.375l-58.625-78.25h-128v-32h32c17.688,0,32-14.313,32-32v-32c0-17.688-14.312-32-32-32h-192
                                        c-17.688,0-32,14.313-32,32v32c0,17.688,14.313,32,32,32h32v32h-128l-58.625,78.25c-9.813,14.688-5.813,34.563,8.875,44.375
                                        C19.69,254.257,25.877,256.007,31.972,256.007z M312.002,24.007h40v24h-32v16h-8V24.007z M256.002,24.007h40v40h-40V24.007z
                                        M208.002,24.007h8v16h16v-16h8v40h-8v-16h-16v16h-8V24.007z M160.002,64.007v-8h24v-8h-24v-24h32v8h-24v8h24v24H160.002z
                                        M224.002,96.007h64v32h-64V96.007z M512.002,512.007h-512c0-26.5,21.5-48,48-48h416
                                        C490.502,464.007,512.002,485.507,512.002,512.007z M96.002,272.007h-32v144v32h384v-32v-144h-32H96.002z M96.002,416.007v-112h96
                                        v112H96.002z M224.002,416.007v-112h192v112H224.002z M144.002,352.007c0,8.844-7.156,16-16,16s-16-7.156-16-16s7.156-16,16-16
                                        C136.846,336.007,144.002,343.163,144.002,352.007z M344.002,40.007h-24v-8h24V40.007z M264.002,32.007h24v24h-24V32.007z"/>
                            </g>
                            </svg>
                        <h5>UMKM : 4</h5>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

</body>
</main>
<script src="https://code.iconly.com/iconly.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    let isDragging = false;
    let startPosition = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID = 0;
    let currentIndex = 0;

    const touchstart = (index, position) => {
        currentIndex = index;
        startPosition = position;
        isDragging = true;
        animationID = requestAnimationFrame(animation);
        carousel.classList.add('grabbing');
    };

    const touchmove = (position) => {
        if (isDragging) {
            const distance = position - startPosition;
            currentTranslate = prevTranslate + distance;
        }
    };

    const touchend = () => {
        if (isDragging) {
            isDragging = false;
            cancelAnimationFrame(animationID);

            const movedBy = currentTranslate - prevTranslate;
            if (movedBy < -100 && currentIndex < 6) {
                currentIndex += 1;
            } else if (movedBy > 100 && currentIndex > 0) {
                currentIndex -= 1;
            }

            setPositionByIndex();
            carousel.classList.remove('grabbing');
        }
    };

    const setPositionByIndex = () => {
        currentTranslate = currentIndex * -carousel.offsetWidth;
        prevTranslate = currentTranslate;
        carousel.style.transform = `translateX(${currentTranslate}px)`;
    };

    const animation = () => {
        carousel.style.transform = `translateX(${currentTranslate}px)`;
        if (isDragging) requestAnimationFrame(animation);
    };

    carousel.addEventListener('mousedown', (e) => {
        touchstart(0, e.pageX);
    });

    carousel.addEventListener('touchstart', (e) => {
        touchstart(0, e.touches[0].clientX);
    });

    carousel.addEventListener('mousemove', (e) => {
        touchmove(e.pageX);
    });

    carousel.addEventListener('touchmove', (e) => {
        touchmove(e.touches[0].clientX);
    });

    carousel.addEventListener('mouseup', touchend);
    carousel.addEventListener('mouseleave', touchend);
    carousel.addEventListener('touchend', touchend);
    carousel.addEventListener('touchcancel', touchend);
});
    document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    let isDragging = false;
    let startPosition = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID = 0;
    let currentIndex = 0;

    const touchstart = (index, position) => {
        currentIndex = index;
        startPosition = position;
        isDragging = true;
        animationID = requestAnimationFrame(animation);
        carousel.classList.add('grabbing');
    };

    const touchmove = (position) => {
        if (isDragging) {
            const distance = position - startPosition;
            currentTranslate = prevTranslate + distance;
        }
    };

    const touchend = () => {
        if (isDragging) {
            isDragging = false;
            cancelAnimationFrame(animationID);

            const movedBy = currentTranslate - prevTranslate;
            if (movedBy < -100 && currentIndex < 6) {
                currentIndex += 1;
            } else if (movedBy > 100 && currentIndex > 0) {
                currentIndex -= 1;
            }

            setPositionByIndex();
            carousel.classList.remove('grabbing');
        }
    };

    const setPositionByIndex = () => {
        currentTranslate = currentIndex * -carousel.offsetWidth;
        prevTranslate = currentTranslate;
        carousel.style.transform = `translateX(${currentTranslate}px)`;
    };

    const animation = () => {
        carousel.style.transform = `translateX(${currentTranslate}px)`;
        if (isDragging) requestAnimationFrame(animation);
    };

    carousel.addEventListener('mousedown', (e) => {
        touchstart(0, e.pageX);
    });

    carousel.addEventListener('touchstart', (e) => {
        touchstart(0, e.touches[0].clientX);
    });

    carousel.addEventListener('mousemove', (e) => {
        touchmove(e.pageX);
    });

    carousel.addEventListener('touchmove', (e) => {
        touchmove(e.touches[0].clientX);
    });

    carousel.addEventListener('mouseup', touchend);
    carousel.addEventListener('mouseleave', touchend);
    carousel.addEventListener('touchend', touchend);
    carousel.addEventListener('touchcancel', touchend);
});


    document.addEventListener('DOMContentLoaded', function() {
        var seriesData = [44, 55, 13, 43, 22];
        var total = seriesData.reduce((acc, curr) => acc + curr, 0);

        var options = {
            series: seriesData,
            chart: {
                width: '600px',
                height: '600',
                type: 'pie',
            },
            labels: ['RT 1', 'RT 2', 'RT 3', 'RT 4', 'RT 5'],
            legend: {
                position: 'bottom'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 300,
                        height: 300
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                label: 'Total',
                                formatter: function (w) {
                                    return total;
                                }
                            }
                        }
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });

    var options = {
    series: [{
      name: 'RT',
      data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
    }],
    chart: {
      height: 300,  // Adjusted height
      width: 500,  // Added width
      type: 'bar',
    },
    plotOptions: {
      bar: {
        borderRadius: 10,
        dataLabels: {
          position: 'top', // top, center, bottom
        },
      }
    },
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val + "%";
      },
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: ["#304758"]
      }
    },
    
    xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      position: 'top',
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      crosshairs: {
        fill: {
          type: 'gradient',
          gradient: {
            colorFrom: '#D8E3F0',
            colorTo: '#BED1E6',
            stops: [0, 100],
            opacityFrom: 0.4,
            opacityTo: 0.5,
          }
        }
      },
      tooltip: {
        enabled: true,
      }
    },
    yaxis: {
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false,
      },
      labels: {
        show: false,
        formatter: function (val) {
          return val + "%";
        }
      }
    
    },
    title: {
      text: 'Iuran Warga',
      floating: true,
      offsetY: 530,  // Adjusted offsetY based on the new height
      align: 'center',
      style: {
        color: '#444'
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chartIuran"), options);
  chart.render();
  const carousel = new Carousel(document.getElementById('default-carousel'));
    carousel.init();
</script>
@endsection
