<div id="header" class="row mx-auto pt-3 pb-3">
    <div class="col-12 col-lg-2 d-flex align-items-center justify-content-center">
        <a href="{{ route('index') }}">
            <img src="{{ url('/assets/remix-logo.png') }}" alt="Logo Remix Niebieszczany">
        </a>
    </div>
    <div class="col-12 col-lg-8 d-flex align-items-center justify-content-center text-center text-uppercase title">LKS Remix Niebieszczany</div>
    <div class="col-12 col-lg-2 d-flex align-items-center justify-content-end">
        <div class="share-button d-none d-xl-flex">
            <span>Polub nas</span>
            <a href="https://www.facebook.com/niebieszczany.remix" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/rmx1994/" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>
<nav id="navbar_top" class="navbar navbar-expand-xl navbar-custom shadow-lg">
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="fas fa-bars"></i>
        </span>
    </button>
    <div class="collapse navbar-collapse ml-xl-5 pl-xl-5" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}"><i class="fas fa-home mr-3"></i>Strona główna</a>
            </li>
            <li class="nav-item dropdown ml-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-male mr-3"></i>Sezon</a>
                <div class="dropdown-menu shadow p-3 mb-5 bg-white rounded" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('season.timetable.index') }}">Terminarz</a>
                    <a class="dropdown-item" href="{{ route('season.standings.index') }}">Tabela</a>
                    <a class="dropdown-item" href="{{ route('season.players.index') }}">Kadra</a>
                    <a class="dropdown-item" href="{{ route('season.stats.index') }}">Statystyki</a>
                </div>
            <li class="nav-item ml-3">
                <a class="nav-link" href="{{ route('gallery') }}"><i class="fas fa-images mr-3"></i>Galeria</a>
            </li>
            <li class="nav-item ml-3">
                <a class="nav-link" href="{{ route('page', 'about') }}"><i class="fas fa-info-circle mr-3"></i>O klubie</a>
            </li>
            <li class="nav-item ml-3">
                <a class="nav-link" href="{{ route('page', 'contact') }}"><i class="far fa-address-book mr-3"></i>Kontakt</a>
            </li>
            @auth
                <li class="nav-item ml-3">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="far fa-address-book mr-3"></i>Panel administratora</a>
                </li>
            @endauth
            <li>
                <hr class="d-flex d-xl-none horizontal-hr">
            </li>
            <li class="row">
                <div class="col-6 d-flex d-xl-none justify-content-start mt-3 mb-2">
                    @guest
                    <a href="{{ route('login') }}" class="vertical-btn">
                        <span class="text">Logowanie</span>
                    </a>
                    @endguest
                </div>
                <div class="col-6 d-flex d-xl-none justify-content-end mt-3 mb-2">
                    <div class="share-button-mobile d-flex d-xl-none">
                        <span>Polub nas</span>
                        <a href="https://www.facebook.com/niebieszczany.remix"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/rmx1994/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
        <div class="d-none d-xl-flex align-items-center">
            @guest
            <a href="{{ route('login') }}" class="vertical-btn ml-5">
                <span class="text">Logowanie</span>
            </a>
            @endguest
        </div>
</nav>
