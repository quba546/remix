<div class="d-flex" id="wrapper">
@include('shared.sidebar-admin')
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <i class="fas fa-bars toggle-admin-icon" id="menu-toggle"></i>
        </nav>
        @include('shared.messages')
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-1 col-lg-2"></div>
                <div class="col-10 col-lg-8 bg-white shadow-lg text-center">
                    <h2 class="text-uppercase font-weight-bold mt-3">{{ $title }}</h2>
                    <hr>
                    <div class="card border-success m-4">
                        <h5 class="card-header">{{ $cardHeader }}</h5>
                        {{ $slot }}
                    </div>
                    <div class="col-1 col-lg-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
