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

    </style>
</head>

<body>
    {{-- Header --}}

     <header class="px2 py3 m0 flex items-center white" style="background-color: #8D8741">
        <div class="burger pointer flex flex-column justify-between mr2">
            <span class="bg-white"></span>
            <span class="bg-white"></span>
            <span class="bg-white"></span>
        </div>
        <nav class="ml-auto">

        </nav>
    </header>

</body>

</html>
