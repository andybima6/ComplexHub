    {{-- Header --}}
    <header class="header-responsive px2 py3 m0 flex items-center fixed-top" style="background-color: #8D8741">
        <div class="burger pointer flex flex-column justify-between mr2">
            <span class="bg-white"></span>
            <span class="bg-white"></span>
            <span class="bg-white"></span>
        </div>
        <nav class="ml-auto h-fit ">

            <svg class= " w-12 h-12 rounded relative left mr-2 mt-1 " viewBox="0 0 52 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="4.12695" y1="19.5" x2="4.12695" y2="38.9925" stroke="#385668" stroke-width="4"/>
                <line y1="-2" x2="19.3393" y2="-2" transform="matrix(-0.662751 0.74884 -0.737003 -0.67589 14.8945 5.42188)" stroke="#385668" stroke-width="4"/>
                <line y1="-2" x2="19.356" y2="-2" transform="matrix(-0.625314 0.780373 -0.769364 -0.638811 33.7109 4.36719)" stroke="#385668" stroke-width="4"/>
                <line y1="-2" x2="21.4848" y2="-2" transform="matrix(0.756985 0.653433 -0.640054 0.76833 32.9785 6.50488)" stroke="#385668" stroke-width="4"/>
                <line y1="-2" x2="15.2292" y2="-2" transform="matrix(0.7684 0.63997 -0.626481 0.779437 13.8301 6.50488)" stroke="#385668" stroke-width="4"/>
                <line x1="23.2773" y1="19.5" x2="23.2773" y2="38.9925" stroke="#385668" stroke-width="4"/>
                <line x1="26.5957" y1="22.915" x2="37.234" y2="22.915" stroke="#385668" stroke-width="4"/>
                <line x1="41.8945" x2="41.8945" y2="39" stroke="#385668" stroke-width="4"/>
                <line x1="49.873" y1="19.5" x2="49.873" y2="38.9925" stroke="#385668" stroke-width="4"/>
                <line y1="36.9922" x2="50" y2="36.9922" stroke="#385668" stroke-width="4"/>
            </svg>

            <p class="inline-block btn p0 mr0">Halo,{{ auth()->user()->name }}</p>
            <br>
            <p class="inline-block btn p0 mr0">RT 10</p>
        </nav>


        <div class="card">
            @include('layouts.breadcrumb')
        </div>

        </div>

    </header>
