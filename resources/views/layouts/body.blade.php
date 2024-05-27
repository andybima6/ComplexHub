<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComplexHub</title>
    <link rel="stylesheet" href="https://unpkg.com/ace-css/css/ace.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href = "{{ asset('css/template.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body>
    @yield('content');
</body>
</html>
