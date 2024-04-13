<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Template Simple Sidebar Menu → by InsertApps.com</title>
    <link rel="stylesheet" href="https://unpkg.com/ace-css/css/ace.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href = "{{ asset('css/template.css') }}">

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
</body>




</html>
