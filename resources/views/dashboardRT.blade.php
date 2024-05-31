@extends('layouts.welcome')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.js" integrity="sha512-qiVW4rNFHFQm0jHli5vkdEwP4GPSzCSp85J7JRHdgzuuaTg31tTMC8+AHdEC5cmyMFDByX639todnt6cxEc1lQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.css" integrity="sha512-LJwWs3xMbOQNFpWVlpR0Dv3ND8TQgLzvBJsfjMcPKax6VJQ8p9WnQvB5J5Lb9/0D31cbnNsh9x5Lz6+mzxgw1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    #kotakBiru {
        background-color: #659DBD; 
        filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));
        font-family: 'Poppins', sans-serif;
    }

    #kotakBiru:hover {
        background-color: #385668;
        cursor: pointer;
        transform: scale(1.05);
        transition: transform 0.2s ease-in-out;
    }

    h6 {
        color: white;
        font-family: 'Poppins', sans-serif;
    }
</style>

<main class="mx-auto" style="min-height: 100vh; background-color: #FBEEC1; padding: 36px; contain: responsive;">
    <div style="height: 60px;"></div>
    <div id="wrapkotak" style="background-color: #FBEEC1; padding: auto; border-radius: 8px; position: relative; top: 32px; left: 16px;">
        <div id="kotak" style="display: flex; flex-wrap: wrap;">
            <div style="flex: 1 1 25%; max-width: 25%; padding: 16px;">
                <div id="kotakBiru" style="border: 1px solid #e3e3e3; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 16px;">
                        <div style="display: flex; align-items: center; justify-content: start;">
                            <div style="background-color: purple; padding: 8px; border-radius: 50%; margin-bottom: 8px;">
                                <i class="iconly-boldProfile" style="color: white;"></i>
                            </div>
                        </div>
                        <div>
                            <h6 style="font-weight: 600;">RT</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div style="flex: 1 1 25%; max-width: 25%; padding: 16px;">
                <div id="kotakBiru" style="border: 1px solid #e3e3e3; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 16px;">
                        <div style="display: flex; align-items: center; justify-content: start;">
                            <div style="background-color: blue; padding: 8px; border-radius: 50%; margin-bottom: 8px;">
                                <i class="iconly-boldBookmark" style="color: white;"></i>
                            </div>
                        </div>
                        <div>
                            <h6 style="font-weight: 600;">Jumlah Warga</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div style="flex: 1 1 25%; max-width: 25%; padding: 16px;">
                <div id="kotakBiru" style="border: 1px solid #e3e3e3; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 16px;">
                        <div style="display: flex; align-items: center; justify-content: start;">
                            <div style="background-color: green; padding: 8px; border-radius: 50%; margin-bottom: 8px;">
                                <i class="iconly-boldBag" style="color: white;"></i>
                            </div>
                        </div>
                        <div>
                            <h6 style="font-weight: 600;">Total Iuran</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div style="flex: 1 1 25%; max-width: 25%; padding: 16px;">
                <div id="kotakBiru" style="border: 1px solid #e3e3e3; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 16px;">
                        <div style="display: flex; align-items: center; justify-content: start;">
                            <div style="background-color: red; padding: 8px; border-radius: 50%; margin-bottom: 8px;">
                                <i class="iconly-boldProfile" style="color: white;"></i>
                            </div>
                        </div>
                        <div>
                            <h6 style="font-weight: 600;">Kegiatan</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>

    <div class="charts" style="display: flex; justify-content: center;">
        <div class="chart">
            <h2 style="font-size: 36px; color: #385668; font-weight: 600; font-family: 'Poppins', sans-serif; text-align: center;">Jumlah Warga</h2>
        <p style="font-size: 20px; text-align:center; color: grey;">Informasi Total Jumlah Warga Setiap RTnya</p><br>
            <div id="chart" style="max-width: 800px; margin: 0 auto;"></div>
        </div>
    </div>

</main>

<script>
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
</script>
@endsection
