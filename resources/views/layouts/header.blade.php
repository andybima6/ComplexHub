
    {{-- Header --}}
    <header class="header-responsive px2 py3 m0 flex items-center fixed-top" style="background-color: #8D8741">
        <div class="burger pointer flex flex-column justify-between mr2">
            <span class="bg-white"></span>
            <span class="bg-white"></span>
            <span class="bg-white"></span>
        </div>
        <nav class="ml-auto h-fit ">
            <img class="w-8 h-8 rounded-full relative left mr-2" src="{{ asset('img/cosplay.png') }}" alt="" >
            <p class="inline-block btn p0 mr0">Halo,Pak Andy</p>
            <br>
            <p class="inline-block btn p0 mr0">RT 10</p>
        </nav>


        <div class="card">
            @include('layouts.breadcrumb')
        </div>

        </div>

    </header>
