@extends('layouts.welcome')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.js" integrity="sha512-qiVW4rNFHFQm0jHli5vkdEwP4GPSzCSp85J7JRHdgzuuaTg31tTMC8+AHdEC5cmyMFDByX639todnt6cxEc1lQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.css" integrity="sha512-LJwWs3xMbOQNFpWVlpR0Dv3ND8TQgLzvBJsfjMcPKax6VJQ8p9WnQvB5J5Lb9/0D31cbnNsh9x5Lz6+mzxgw1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

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

</main>

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
