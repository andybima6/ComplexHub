@extends('layouts.welcome')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.js" integrity="sha512-qiVW4rNFHFQm0jHli5vkdEwP4GPSzCSp85J7JRHdgzuuaTg31tTMC8+AHdEC5cmyMFDByX639todnt6cxEc1lQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.css" integrity="sha512-LJwWs3xMbOQNFpWVlpR0Dv3ND8TQgLzvBJsfjMcPKax6VJQ8p9WnQvB5J5Lb9/0D31cbnNsh9x5Lz6+mzxgw1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconly@2.3.0/dist/iconly.min.css">

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

    .charts2 {
        display: flex;
        justify-content: space-between;
        margin: 0 auto;
        max-width: 1200px;
    }

    .chart2, .umkm-container {
        flex: 1;
        margin: auto;
    }

    .chart2 {
        /* display: flex;
        flex-direction: column; */
        align-items: left;
    }
    
    .umkm-container {
        /* display: flex;
        flex-direction: column; */
        align-items: right;
    }
    #chartIuran {
    max-width: 50%;
    width: auto; /* Adjust width as needed */
    height: auto; /* Adjust height as needed */
    float: left;
}


    .carousel {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
}

.carouselUMKM {
    margin: 0 auto; /* Pusatkan carousel secara horizontal */
    max-width: 7xl; /* Sesuaikan lebar maksimum sesuai kebutuhan */
    overflow: hidden; /* Sembunyikan konten yang meluap untuk scrolling halus */
  }


  .carousel-item {
    scroll-snap-align: center;
    flex: 0 0 auto;
    width: 300px; /* Sesuaikan lebar berdasarkan konten gambar */
    margin-right: 1rem; /* Margin kanan */
    border-radius: 0.5rem; /* Pertahankan sudut membulat */
}


  .carousel-item img {
    width: 100%; /* Pastikan gambar mengisi lebar item */
    height: auto; /* Pertahankan rasio aspek */
    object-fit: cover; /* Potong gambar agar pas sambil menjaga rasio aspek */
    border-radius: inherit; /* Warisi sudut membulat dari carousel-item */
  }

  /* Tambahkan efek hover atau fokus opsional untuk item carousel (opsional) */
  .carousel-item:hover,
  .carousel-item:focus {
    opacity: 0.8; /* Tambahkan sedikit perubahan opacity pada hover/focus */
    cursor: pointer; /* Tunjukkan interaktivitas */
  }

  .carousel::-webkit-scrollbar {
  width: 10px; /* Lebar scroller */
  background-color: transparent; /* Warna latar belakang scroller */
}

.carousel::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.2); /* Warna scroller */
  border-radius: 5px; /* Sudut sudut scroller */
}

.carousel {
  scrollbar-width: thin; /* Lebar scroller */
  scrollbar-color: transparent transparent; /* Warna scroller */
}






#kotakBiru {
    transition: all 0.3s ease;
    cursor: pointer;
}

#kotakBiru:hover {
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.iconly-boldShop, .iconly-boldMessage {
    display: block;
    margin-bottom: 16px;
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

    <br><br><br><br>

    
    <div class="charts" style="display: flex; justify-content: center;">
        <div class="chart md:max-w-lg">
            <h2 style="font-size: 36px; color: #385668; font-weight: 600; font-family: 'Poppins', sans-serif; text-align: center;">Jumlah Warga</h2>
        <p style="font-size: 20px; text-align:center; color: grey;">Informasi Total Jumlah Warga Setiap RTnya</p><br>
            <div id="chart" style="max-width: 800px; margin: 0 auto;"></div>
        </div>
    </div>
    <br><br><br><br><br>
    <div class="charts2 grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="chart2">
            <h2 style="font-size: 36px; color: #385668; font-weight: 600; font-family: 'Poppins', sans-serif; text-align: center;">Jumlah Iuran</h2>
            <p style="font-size: 20px; text-align:center; color: grey;">Chart Iuran Warga setiap bulan</p><br>
            <div id="chartIuran"></div>
        </div>
        ...
        <div class="carouselUMKM max-w-lg mx-auto md:max-w-7xl">
            <h2 style="font-size: 36px; color: #385668; font-weight: 600; font-family: 'Poppins', sans-serif; text-align: center;">UMKM WARGA</h2>
            <p style="font-size: 20px; text-align:center; color: grey;">Informasi UMKM yang blabla</p><br>
            <div class="carousel carousel-center max-w-md p-4 space-x-4 bg-neutral rounded-box">
                @foreach ($izinUsaha as $izin)
                    <div class="carousel-item">
                        <img src="{{ asset('storage/' . $izin->foto_produk) }}" alt="" class="rounded-box">
                        <h3 style="font-size: 18px; color: #FBEEC1; margin-top: 10px;">{{ $izin->nama_usaha }}</h3>
                        <p style="font-size: 14px; color: #FBEEC1;">{{ $izin->deskripsi }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        ...
        
    </div>
    
    <div id="wrapkotak2" style="padding: 40px; border-radius: 12px; position: relative; top: 32px; left: 16px;">
        <div id="kotak" style="display: flex; flex-wrap: wrap; justify-content: center;">
            <div style="flex: 1 1 28%; max-width: 28%; padding: 20px;">
                <div id="kotakBiru" style="background-color: #3F51B5; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 24px;">
                        <div style="display: flex; align-items: center; justify-content: center;">
                            <i class="iconly-boldShop" style="font-size: 40px; color: white;"></i>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: center;">
                            <svg version="1.1" id="_x31_-outline-expand" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px" y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64; width: 40px; height: 40px;" xml:space="preserve">
                                <path style="fill:#ffffff;" d="M57,21h-2v8h2c2.209,0,4-1.791,4-4v0C61,22.791,59.209,21,57,21z"/>
                                <path style="fill:#ffffff;" d="M45,44.12c-2.41,1.2-5.12,1.88-8,1.88s-5.59-0.68-8-1.88c-5.36-2.66-9.2-7.91-9.89-14.12h35.78
                                    C54.2,36.21,50.36,41.46,45,44.12z"/>
                                <path style="fill:#ffffff;" d="M55,20v1c-3.31,0-6-2.69-6-6v-1H21.21c-0.33,0-0.67-0.03-0.99-0.08c-0.05-0.01-0.1-0.01-0.14-0.02
                                    c-2.54-0.46-4.65-2.42-5.02-5.03c-0.48-3.42,1.93-6.38,5.14-6.81C20.63,3.19,21.72,4,23,4h16C47.84,4,55,11.16,55,20z"/>
                                <circle style="fill:#ffffff;" cx="30" cy="25" r="2"/>
                                <circle style="fill:#ffffff;" cx="44" cy="25" r="2"/>
                                <path style="fill:#ffffff;" d="M37,54.861l9.363-5.107C45.523,49.011,45,47.936,45,46.75v-0.425C42.549,47.396,39.846,48,37,48
                                    s-5.549-0.604-8-1.675v0.425c0,1.186-0.523,2.261-1.363,3.004L37,54.861z"/>
                                <polygon style="fill:#ffffff;" points="25.329,50.773 23.714,51.114 19,55.828 19,61 36,61 36,56.593 "/>
                                <path style="fill:#ffffff;" d="M3,35c1.105,0,2,0.895,2,2c0-1.105,0.895-2,2-2s2,0.895,2,2c0-1.105,0.895-2,2-2s2,0.895,2,2V27
                                    c0-1.105,0.895-2,2-2s2,0.895,2,2v19h1v-2c0-2.209,1.791-4,4-4v10l-5,5v6H1V37C1,35.895,1.895,35,3,35z"/>
                                <path style="fill:#ffffff;" d="M63,55.382c-0.042-0.039-0.078-0.084-0.12-0.122c-1.42-1.26-3.16-2.16-5.07-2.56l-9.139-1.927
                                    L38,56.593V61h25V55.382z M56,59H43v-3h13V59z"/>
                            </svg>
                            <h5 style="font-weight: 600; color: white; margin-left: 10px;">Saran Dan Pengaduan</h5>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div style="flex: 1 1 28%; max-width: 28%; padding: 20px;">
                <div id="kotakBiru" style="background-color: #2196F3; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 24px;">
                        <div style="display: flex; align-items: center; justify-content: center;">
                            <i class="iconly-boldMessage" style="font-size: 40px; color: white;"></i>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: center;">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="40px" height="40px" viewBox="0 0 512.013 512.014" style="enable-background:new 0 0 512.013 512.014;"xml:space="preserve">
                            <g fill="white">
                                <path d="M31.972,256.007c10.344,0,20.469-5,26.656-14.25l6.875-10.313c3.438,13.969,15.469,24.563,30.5,24.563
                                        c17.688,0,32-14.313,32-32c0,17.688,14.313,32,32,32s32-14.313,32-32c0,17.688,14.313,32,32,32s32-14.313,32-32
                                        c0,17.688,14.312,32,32,32c17.687,0,32-14.313,32-32c0,17.688,14.312,32,32,32s32-14.313,32-32c0,17.688,14.312,32,32,32
                                        c15.062,0,27.062-10.594,30.5-24.563l6.875,10.313c6.156,9.25,16.312,14.25,26.656,14.25c6.094,0,12.25-1.75,17.719-5.375
                                        c14.719-9.813,18.688-29.688,8.875-44.375l-58.625-78.25h-128v-32h32c17.688,0,32-14.313,32-32v-32c0-17.688-14.312-32-32-32h-192
                                        c-17.688,0-32,14.313-32,32v32c0,17.688,14.313,32,32,32h32v32h-128l-58.625,78.25c-9.813,14.688-5.813,34.563,8.875,44.375
                                        C19.69,254.257,25.877,256.007,31.972,256.007z M312.002,24.007h40v24h-32v16h-8V24.007z M256.002,24.007h40v40h-40V24.007z
                                        M208.002,24.007h8v16h16v-16h8v40h-8v-16h-16v16h-8V24.007z M160.002,64.007v-8h24v-8h-24v-24h32v8h-24v8h24v24H160.002z
                                        M224.002,96.007h64v32h-64V96.007z M512.002,512.007h-512c0-26.5,21.5-48,48-48h416
                                        C490.502,464.007,512.002,485.507,512.002,512.007z M96.002,272.007h-32v144v32h384v-32v-144h-32H96.002z M96.002,416.007v-112h96
                                        v112H96.002z M224.002,416.007v-112h192v112H224.002z M144.002,352.007c0,8.844-7.156,16-16,16s-16-7.156-16-16s7.156-16,16-16
                                        C136.846,336.007,144.002,343.163,144.002,352.007z M344.002,40.007h-24v-8h24V40.007z M264.002,32.007h24v24h-24V32.007z"/>
                            </g>
                            </svg>
                            <h5 style="font-weight: 600; color: white; text-align: center;">UMKM</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</main>
<script src="https://code.iconly.com/iconly.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    let isDragging = false;
    let startPosition = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID = 0;
    let currentIndex = 0;

    const touchstart = (index, position) => {
        currentIndex = index;
        startPosition = position;
        isDragging = true;
        animationID = requestAnimationFrame(animation);
        carousel.classList.add('grabbing');
    };

    const touchmove = (position) => {
        if (isDragging) {
            const distance = position - startPosition;
            currentTranslate = prevTranslate + distance;
        }
    };

    const touchend = () => {
        if (isDragging) {
            isDragging = false;
            cancelAnimationFrame(animationID);

            const movedBy = currentTranslate - prevTranslate;
            if (movedBy < -100 && currentIndex < 6) {
                currentIndex += 1;
            } else if (movedBy > 100 && currentIndex > 0) {
                currentIndex -= 1;
            }

            setPositionByIndex();
            carousel.classList.remove('grabbing');
        }
    };

    const setPositionByIndex = () => {
        currentTranslate = currentIndex * -carousel.offsetWidth;
        prevTranslate = currentTranslate;
        carousel.style.transform = `translateX(${currentTranslate}px)`;
    };

    const animation = () => {
        carousel.style.transform = `translateX(${currentTranslate}px)`;
        if (isDragging) requestAnimationFrame(animation);
    };

    carousel.addEventListener('mousedown', (e) => {
        touchstart(0, e.pageX);
    });

    carousel.addEventListener('touchstart', (e) => {
        touchstart(0, e.touches[0].clientX);
    });

    carousel.addEventListener('mousemove', (e) => {
        touchmove(e.pageX);
    });

    carousel.addEventListener('touchmove', (e) => {
        touchmove(e.touches[0].clientX);
    });

    carousel.addEventListener('mouseup', touchend);
    carousel.addEventListener('mouseleave', touchend);
    carousel.addEventListener('touchend', touchend);
    carousel.addEventListener('touchcancel', touchend);
});
    document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    let isDragging = false;
    let startPosition = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID = 0;
    let currentIndex = 0;

    const touchstart = (index, position) => {
        currentIndex = index;
        startPosition = position;
        isDragging = true;
        animationID = requestAnimationFrame(animation);
        carousel.classList.add('grabbing');
    };

    const touchmove = (position) => {
        if (isDragging) {
            const distance = position - startPosition;
            currentTranslate = prevTranslate + distance;
        }
    };

    const touchend = () => {
        if (isDragging) {
            isDragging = false;
            cancelAnimationFrame(animationID);

            const movedBy = currentTranslate - prevTranslate;
            if (movedBy < -100 && currentIndex < 6) {
                currentIndex += 1;
            } else if (movedBy > 100 && currentIndex > 0) {
                currentIndex -= 1;
            }

            setPositionByIndex();
            carousel.classList.remove('grabbing');
        }
    };

    const setPositionByIndex = () => {
        currentTranslate = currentIndex * -carousel.offsetWidth;
        prevTranslate = currentTranslate;
        carousel.style.transform = `translateX(${currentTranslate}px)`;
    };

    const animation = () => {
        carousel.style.transform = `translateX(${currentTranslate}px)`;
        if (isDragging) requestAnimationFrame(animation);
    };

    carousel.addEventListener('mousedown', (e) => {
        touchstart(0, e.pageX);
    });

    carousel.addEventListener('touchstart', (e) => {
        touchstart(0, e.touches[0].clientX);
    });

    carousel.addEventListener('mousemove', (e) => {
        touchmove(e.pageX);
    });

    carousel.addEventListener('touchmove', (e) => {
        touchmove(e.touches[0].clientX);
    });

    carousel.addEventListener('mouseup', touchend);
    carousel.addEventListener('mouseleave', touchend);
    carousel.addEventListener('touchend', touchend);
    carousel.addEventListener('touchcancel', touchend);
});
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

    var options = {
    series: [{
      name: 'RT',
      data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
    }],
    chart: {
      height: 400,  // Adjusted height
      width: 600,  // Added width
      type: 'bar',
    },
    plotOptions: {
      bar: {
        borderRadius: 10,
        dataLabels: {
          position: 'top', // top, center, bottom
        },
      }
    },
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val + "%";
      },
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: ["#304758"]
      }
    },
    
    xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      position: 'top',
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      crosshairs: {
        fill: {
          type: 'gradient',
          gradient: {
            colorFrom: '#D8E3F0',
            colorTo: '#BED1E6',
            stops: [0, 100],
            opacityFrom: 0.4,
            opacityTo: 0.5,
          }
        }
      },
      tooltip: {
        enabled: true,
      }
    },
    yaxis: {
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false,
      },
      labels: {
        show: false,
        formatter: function (val) {
          return val + "%";
        }
      }
    
    },
    title: {
      text: 'Iuran Warga',
      floating: true,
      offsetY: 530,  // Adjusted offsetY based on the new height
      align: 'center',
      style: {
        color: '#444'
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chartIuran"), options);
  chart.render();
  const carousel = new Carousel(document.getElementById('default-carousel'));
    carousel.init();
</script>
@endsection
