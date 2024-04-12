<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Template Simple Sidebar Menu → by InsertApps.com</title>
    <link rel="stylesheet" href="https://unpkg.com/ace-css/css/ace.min.css">
    <style>
        /*Additional Style */
        /* ######## START FOCUS CSS CODE HERE */
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

        /* ######## END FOCUS CSS CODE HERE */
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

        .close {
            width: 23px;
            height: 23px;
        }


        .cross {
            height: 23px;
            width: 2px;
            border-radius: 3px;
        }

        .cross.left {
            transform: rotate(45deg);
        }

        .cross.right {
            transform: rotate(-45deg);
        }

        .align-middle {
            vertical-align: middle
        }

        .header-responsive {
            transition: all 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Animasi perubahan ukuran */
        }

        /* CSS untuk header responsif saat sidebar aktif */
        .sidebar-active .header-responsive {
            width: calc(100% - var(--sidebar-width));
            top: 0;
            left: var(--sidebar-width);
            height: var(--header-height);
            line-height: var(--header-height);
            transition: all 0.3s ease;
        }

        :root {
            --sidebar-width: 330px;
            /* Sesuaikan dengan lebar sidebar */
            --header-height: 70px;
            /* Sesuaikan dengan tinggi header */
        }

        .footer-responsive {
            transition: all 0.3s ease;
            /* Animasi perubahan ukuran */
        }

        .sidebar-active .footer-responsive {
            margin-left: 330px;
            transition: all 0.3s ease
                /* Sesuaikan dengan lebar sidebar */
        }


    </style>
</head>

<body>
    {{-- Header --}}

    <header class="header-responsive px2 py3 m0 flex items-center fixed-top" style="background-color: #8D8741">
        <div class="burger pointer flex flex-column justify-between mr2">
            <span class="bg-white"></span>
            <span class="bg-white"></span>
            <span class="bg-white"></span>
        </div>
        <nav class="ml-auto user">
            <p class ="inline-block btn p0 mr1">Halo,Andy</p>

            </ul>
        </nav>
    </header>

</body>
{{-- Sidebar --}}
<div id="sidenav" class="fixed z4 top-0 left-0 p2">
    <div class="close flex items-center justify-center relative pointer mb2 right">
        <div class="absolute cross bg-black left"></div>
        <div class="absolute cross bg-black right"></div>
    </div>

    <div class="flex items-center ">
        <svg width="52" height="39" viewBox="0 0 52 39" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="4.12695" y1="19.5" x2="4.12695" y2="38.9925" stroke="#2A424F" stroke-width="4" />
            <line y1="-2" x2="19.3393" y2="-2"
                transform="matrix(-0.662751 0.74884 -0.737003 -0.67589 14.8945 5.42188)" stroke="#2A424F"
                stroke-width="4" />
            <line y1="-2" x2="19.356" y2="-2"
                transform="matrix(-0.625314 0.780373 -0.769364 -0.638811 33.7109 4.36719)" stroke="#2A424F"
                stroke-width="4" />
            <line y1="-2" x2="21.4848" y2="-2"
                transform="matrix(0.756985 0.653433 -0.640054 0.76833 32.9785 6.50488)" stroke="#2A424F"
                stroke-width="4" />
            <line y1="-2" x2="15.2292" y2="-2"
                transform="matrix(0.7684 0.63997 -0.626481 0.779437 13.8301 6.50488)" stroke="#2A424F"
                stroke-width="4" />
            <line x1="23.2773" y1="19.5" x2="23.2773" y2="38.9925" stroke="#2A424F" stroke-width="4" />
            <line x1="26.5957" y1="22.9146" x2="37.234" y2="22.9146" stroke="#2A424F" stroke-width="4" />
            <line x1="41.8945" x2="41.8945" y2="39" stroke="#2A424F" stroke-width="4" />
            <line x1="49.873" y1="19.5" x2="49.873" y2="38.9925" stroke="#2A424F" stroke-width="4" />
            <line y1="36.9927" x2="50" y2="36.9927" stroke="#2A424F" stroke-width="4" />
        </svg>

        <p id="sidebar-title" class="m5 bold"
            style = "margin-left: 15px; color: #2A424F; text-decoration: none; font-family: 'Inter', sans-serif; font-weight: 600; font-size: 24px;">
            ComplexHub</p>

    </div>

    <hr>


</html>
