@extends('layouts.welcome')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saran dan Pengaduan</title>
    <link rel="stylesheet" href="{{ asset('css/itu.css') }}">
</head>
<body>
    <button id="openFormBtn">Buat Form</button>

    <div class="overlay" id="overlay">
        <div class="popup" id="popup">
            <h2>Saran dan Pengaduan</h2>
            <button id="closeFormBtn">&times;</button>
            <form id="suggestionForm">
                <label for="name">Nama:</label>
                <input type="text" id="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" required>
                <label for="message">Pesan:</label>
                <textarea id="message" rows="4" required></textarea>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/itu.js') }}"></script>
</body>
</html>
