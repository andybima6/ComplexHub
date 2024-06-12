<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComplexHub</title>
    <link rel="stylesheet" href="https://unpkg.com/ace-css/css/ace.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href = "{{ asset('css/template.css') }}">
    <link rel="stylesheet" href = "{{ asset('css/iuran.css') }}">
    <link rel="stylesheet" href = "{{ asset('css/metode2.css') }}">
    <link rel="stylesheet" href = "{{ asset('css/button.css') }}">
    <link rel="stylesheet" href = "{{ asset('css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">


    <style>
        #sidenav {
            max-height: 100vh;
            height: 100vh;
            max-width: 70vw;
            min-width: 300px;
            overflow-x: hidden;
            overflow-y: auto;
            transition: all .3s ease-in-out;
            transform: translate(-150%, 0px);
            -webkit-transform: translate(-150%, 0px);
            -ms-transform: translate(-150%, 0px);
            background-color: #FBEEC1;
            /* Ubah warna sidebar di sini */
        }

        #sidenav.active {
            transition: all .3s ease-in-out;
            transform: translate(0%, 0px);
            -webkit-transform: translate(0%, 0px);
            -ms-transform: translate(0%, 0px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, .4);
        }


        .burger {
            height: 16px
        }

        .burger span {
            display: block;
            width: 20px;
            height: 2px;
            border-radius: 3px;
        }

        .pointer {
            cursor: pointer;
        }
    </style>

    @vite('resources/css/app.css')

</head>

<body>
    @include('layouts.header')
    @include('layouts.sidebar')
    @yield('content')

    {{-- JS --}}
    <script src='{{ asset('js/close.js') }}'></script>
    <script src='{{ asset('js/dropDown.js') }}'></script>
    <script src='{{ asset('js/sidebarAnimation.js') }}'></script>
    <script src='{{ asset('js/judul.js') }}'></script>
    <script src='{{ asset('js/popUp.js') }}'></script>
    <script src='{{ asset('js/editPopUpKegiatan.js') }}'></script>
    <script src='{{ asset('js/tambahKegiatanPopup.js') }}'></script>
    <script>
        window.onload = function() {
            document.querySelectorAll('input[type="file"]').forEach(element => {
                element.addEventListener('change', (e) => {
                    const files = e.target.files;
                    const id = element.id;
                    const label = document.querySelector('label[for="' + id + '"]');

                    if (files.length && label) {
                        const filename = Array.from(files).map(f => f.name).join(', ');
                        label.innerText = filename;
                    } else if (label) {
                        label.innerText = '';
                    }
                });
            })
        }
    </script>

    </nav>
    </header>

</body>

</head>
