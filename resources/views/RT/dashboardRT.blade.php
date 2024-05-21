@extends('layouts.welcome')
@section('content')
    <main>
        <title>Dashboard</title>

        @section('master')
            <section>
                <div class="container-fluid">
                    <div class="page-heading">
                        <h3>Dashboard</h3>
                    </div>
                    <div class="page-content mt-4">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card shadow">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Data RW</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card shadow">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Data RT</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card shadow">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="fas fa-address-card"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Data KK</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card shadow">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total Warga</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-9">
                                <div class="col-lg-12">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <h4>Pertambahan warga setiap bulan</h4>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="warga"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div>
                                    <div class="col-12 col-lg-12">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h4>Usia</h4>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="usia"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-12 col-lg-12">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h4>Gender</h4>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="gender"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            {{-- CHART GENDER --}}
            <script>
                const data = {
                    labels: ['Laki-Laki', 'Perempuan'],
                    datasets: [{
                        label: 'Gender',
                        backgroundColor: ['rgb(87, 202, 235)', 'rgb(255, 121, 118)'],
                        hoverOffset: 4
                    }]
                };

                const config = {
                    type: 'doughnut',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        }
                    },
                };

                const chartGender = new Chart(
                    document.getElementById('gender'),
                    config
                );
            </script>
            {{-- CHART GENDER --}}

            {{-- CHART USIA --}}
            <script>
                const data_usia = {
                    labels: ['Dewasa', 'Anak-anak'],
                    datasets: [{
                        label: 'Usia',
                        backgroundColor: ['rgb(87, 202, 235)', 'rgb(255, 121, 118)'],
                        hoverOffset: 4
                    }]
                };

                const usia = {
                    type: 'bar',
                    data: data_usia,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        }
                    },
                };

                const chartUsia = new Chart(
                    document.getElementById('usia'),
                    usia
                );
            </script>
            {{-- CHART USIA --}}

            {{-- CHART PENDUDUK --}}
            <script>
                const datawarga = {
                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    datasets: [{
                        label: 'Warga',
                        data: [],
                        fill: true,
                        borderColor: 'rgb(86, 182, 247)',
                        tension: 0.3
                    }]
                };

                const warga = {
                    type: 'line',
                    data: datawarga,
                    options: {
                        responsive: true,
                    }
                };

                const chartWarga = new Chart(
                    document.getElementById('warga'),
                    warga
                );
            </script>
            {{-- CHART PENDUDUK --}}
        @endsection

    </main>
@endsection
