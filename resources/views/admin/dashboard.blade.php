@extends('layout.app')

@section('content')
    <div class="d-flex" id="wrapper">
        @include('shared.sidebar-admin')
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <i class="fas fa-bars toggle-admin-icon" id="menu-toggle"></i>
            </nav>
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-1 col-lg-2"></div>
                    <div class="col-10 col-lg-8 bg-white shadow-lg text-center">
                        <h2 class="text-uppercase font-weight-bold mt-3">Panel administratora</h2>
                        <div class="border border-success rounded m-4">
                            <h4>Witaj (imię)</h4>
                            <p>
                                Z poziomu panelu administratora możesz zarządzać zawartością całego serwisu.
                            </p>
                        </div>
                    </div>
                    <div class="col-1 col-lg-2"></div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection
