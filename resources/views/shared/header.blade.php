<div id="header" class="row mx-auto pt-3 pb-3">
    <div class="col-12 col-lg-2 d-flex align-items-center justify-content-center">
        <a href="#">
            <img src="{{ url('/assets/remix-logo.png') }}" alt="Logo Remix Niebieszczany">
        </a>
    </div>
    <div class="col-12 col-lg-8 d-flex align-items-center justify-content-center text-center text-uppercase title">LKS Remix Niebieszczany</div>
    <div class="col-12 col-lg-2 d-flex align-items-center justify-content-center">
    </div>
</div>
<nav id="navbar_top" class="navbar navbar-expand-xl navbar-custom shadow-lg">
    <a class="navbar-brand d-flex d-xl-none" href="#">
        <img src="{{ url('/assets/remix-logo.png') }}" height="40px" alt="Logo Remix Niebieszczany">
    </a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
        </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"><i class="fas fa-home mr-3"></i>Strona główna<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown ml-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-male mr-3"></i>Sezon</a>
                <div class="dropdown-menu shadow p-3 mb-5 bg-white rounded" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Terminarz</a>
                    <a class="dropdown-item" href="#">Tabela</a>
                    <a class="dropdown-item" href="#">Kadra</a>
                    <a class="dropdown-item" href="#">Statystyki</a>
                </div>
            <li class="nav-item ml-3">
                <a class="nav-link" href="#"><i class="fas fa-child mr-3"></i>Sekcje młodzieżowe</a>
            </li>
            <li class="nav-item ml-3">
                <a class="nav-link" href="#"><i class="fas fa-info-circle mr-3"></i>O klubie</a>
            </li>
            <li class="nav-item ml-3">
                <a class="nav-link" href="#"><i class="far fa-address-book mr-3"></i>Kontakt</a>
            </li>
            <li>
                <hr class="d-flex d-xl-none horizontal-hr">
            </li>
            <li class="row">
                <div class="col-6 d-flex d-xl-none justify-content-center">
                    <a href="#">
                        <i class="fab fa-facebook navbar-social-icon"></i>
                    </a>
                </div>
                <div class="col-6 d-flex d-xl-none justify-content-center">
                    <a href="#">
                        <i class="fab fa-instagram navbar-social-icon"></i>
                    </a>
                </div>
            </li>
            <li class="row">
                <div class="col-12 d-flex d-xl-none justify-content-start mt-3 mb-2">
                    <a href="#" class="vertical-btn">
                        <span class="text">Logowanie</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <div class="d-none d-xl-flex align-items-center">
        <a href="#">
            <i class="fab fa-facebook navbar-social-icon"></i>
        </a>
        <a href="#">
            <i class="fab fa-instagram ml-4 navbar-social-icon"></i>
        </a>
        <a href="#" class="vertical-btn ml-5">
            <span class="text">Logowanie</span>
        </a>
    </div>
</nav>
