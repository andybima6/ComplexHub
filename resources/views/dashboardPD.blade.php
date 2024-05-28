@extends('layouts.welcome')
@section('content')
    <main>
        <h1 style="margin-top: 10%; margin-left:3%; font-family: 'Poppin', sans-serif; font-weight:600; font-size:20px;">Selamat datang di Sistem Informasi RW kita, {{ auth()->user()->name }}</h1>
    </main>
@endsection
