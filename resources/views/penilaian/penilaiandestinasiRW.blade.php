@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">

        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=0">
        <title>Navbar, Tabel</title>
        <style>
            #navbar {
                text-align: center;
            }
            #navbar a {
                display: inline-block;
                padding: 10px 20px;
                text-decoration: none;
                font-size: 24px;
                font-weight: 600;
            }
        </style>
        
        <nav id="navbar">
            <a href="{{ url('destinasi/RW/berandadestinasiRW') }}">Beranda</a>
            <a href="{{ url('destinasi/Destinasi/kriteriadestinasiRW') }}">Kriteria</a>
            <a href="{{ url('destinasi/Destinasi/alternatifdestinasiRW') }}">Alternatif</a>
            <a href="{{ url('destinasi/Destinasi/penilaiandestinasiRW') }}">Penilaian</a>
            <a href="{{ url('destinasi/Destinasi/rankingdestinasiRW') }}">Ranking</a>
        </nav>

        <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28">
            <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Penilaian Data Alternatif :</p>
            <table class="md:table-fixed w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center w-1/7">No</th>
                        <th class="border px-4 py-2 text-center w-1/7">Fasilitas</th>
                        <th class="border px-4 py-2 text-center w-1/7">Harga Tiket</th>
                        <th class="border px-4 py-2 text-center w-1/7">Kebersihan</th>
                        <th class="border px-4 py-2 text-center w-1/7">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2 text-center">1</td>
                        <td class="border px-4 py-2 text-center">Sangat lengkap</td>
                        <td class="border px-4 py-2 text-center">Rp. 500.000</td>
                        <td class="border px-4 py-2 text-center">Lumayan bersih</td>
                        <td class="border px-4 py-2 text-center grid grid-cols-3 gap-0">
                            <button class="" style="width:45px;height:34px;border-radius:10px;background-color:#2F80ED">
                                <svg style="margin-left: 10px;margin-top:2px" width="25" height="24" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 3H21.5V9" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M9.5 21H3.5V15" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M21.5 3L14.5 10" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M3.5 21L10.5 14" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
        
                            </button>
                            <button class="" style="width:45px;height:34px;border-radius:10px;background-color:#EB5757">
                                <svg style="margin-left: 10px;margin-top:2px" width="25" height="24" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.5 6L6.5 18" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M6.5 6L18.5 18" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
        
                            </button>
                            <button class="" style="width:45px;height:34px;border-radius:10px;background-color:#27AE60">
                                <svg style="margin-left: 12px;margin-top:2px" width="19" height="13" viewBox="0 0 19 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.5 1L6.5 12L1.5 7" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
        
                            </button>
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 text-center">2</td>
                        <td class="border px-4 py-2 text-center">Lengkap</td>
                        <td class="border px-4 py-2 text-center">Rp. 1 juta</td>
                        <td class="border px-4 py-2 text-center">Sangat bersih</td>
                        <td class="border px-4 py-2 text-center grid grid-cols-3 gap-0">
                            <button class="" style="width:45px;height:34px;border-radius:10px;background-color:#2F80ED">
                                <svg style="margin-left: 10px;margin-top:2px" width="25" height="24" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 3H21.5V9" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M9.5 21H3.5V15" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M21.5 3L14.5 10" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M3.5 21L10.5 14" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
        
                            </button>
                            <button class="" style="width:45px;height:34px;border-radius:10px;background-color:#EB5757">
                                <svg style="margin-left: 10px;margin-top:2px" width="25" height="24" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.5 6L6.5 18" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M6.5 6L18.5 18" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
        
                            </button>
                            <button class="" style="width:45px;height:34px;border-radius:10px;background-color:#27AE60">
                                <svg style="margin-left: 12px;margin-top:2px" width="19" height="13" viewBox="0 0 19 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.5 1L6.5 12L1.5 7" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
        
                            </button>
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 text-center">3</td>
                        <td class="border px-4 py-2 text-center">Kurang Lengkap</td>
                        <td class="border px-4 py-2 text-center">Rp. 850.000</td>
                        <td class="border px-4 py-2 text-center">lumayan bersih</td>
                        <td class="border px-4 py-2 text-center grid grid-cols-3 gap-0">
                            <button class="" style="width:45px;height:34px;border-radius:10px;background-color:#2F80ED">
                                <svg style="margin-left: 10px;margin-top:2px" width="25" height="24" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 3H21.5V9" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M9.5 21H3.5V15" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M21.5 3L14.5 10" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M3.5 21L10.5 14" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
        
                            </button>
                            <button class="" style="width:45px;height:34px;border-radius:10px;background-color:#EB5757">
                                <svg style="margin-left: 10px;margin-top:2px" width="25" height="24" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.5 6L6.5 18" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M6.5 6L18.5 18" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
        
                            </button>
                            <button class="" style="width:45px;height:34px;border-radius:10px;background-color:#27AE60">
                                <svg style="margin-left: 12px;margin-top:2px" width="19" height="13" viewBox="0 0 19 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.5 1L6.5 12L1.5 7" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
        
                            </button>
                        </td>
                    </tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection
