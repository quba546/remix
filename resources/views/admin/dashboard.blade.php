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
                            <div class="container">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <h4>Witaj <b>{{ Auth::user()->name ?? '' }}</b></h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <img src="{{ url('/assets/admin_panel.png') }}" alt="Panel administratora" width="30%">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>
                                            Z poziomu panelu administratora możesz zarządzać zawartością całego serwisu.
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-uppercase">Ostatnie logowanie: {{ Auth::user()->last_login_at ?? '' }}</p>
                                        <p class="text-uppercase">IP: {{ Auth::user()->last_login_ip ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
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
