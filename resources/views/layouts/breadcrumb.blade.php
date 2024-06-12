<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-7 ml-7 mt-7" style="color: #000000; text-decoration: none; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 24px;">
            <div class="flex flex-row gap-2">
                <h1 class="mobile-header">{{ $breadcrumb->title }} <span style="font-size: 20px; font-weight: normal;">&gt;</span></h1>
                <h2 class="mobile-header" style="relative top-4 font-size: 20px;font-weight: normal;color : black">{{ $breadcrumb->subtitle }}</h2>
            </div>
        </div>
    </div>
</section>

<style>
    @media (max-width: 767px) {
        /* Media query untuk tampilan mobile */
        .mobile-header {
            font-size: 18px; /* Ukuran font yang lebih kecil untuk mobile */
        }
    }
</style>
