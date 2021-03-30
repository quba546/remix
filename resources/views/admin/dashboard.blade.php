@extends('layout.app')

@section('content')
    <div class="d-flex" id="wrapper">
    @include('shared.sidebar-admin')
    <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <i class="fas fa-bars toggle-admin-icon" id="menu-toggle"></i>
            </nav>
            @include('shared.messages')
            @if (session()->has('flash_notification.success'))
                <div class="alert alert-success alert-block text-center mt-3 mb-3 ml-5 mr-5">
                    <button type="button" class="close" data-dismiss="alert">✕</button>
                    <strong>{{ session('flash_notification.success') }}</strong>
                </div>
            @endif
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-1 col-lg-2"></div>
                    <div class="col-10 col-lg-8 bg-white shadow-lg text-center">
                        <h2 class="text-uppercase font-weight-bold mt-3">Dashboard</h2>
                        <hr>
                        <div class="card border-success m-4">
                            <h5 class="card-header">Strona główna</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <h4>Witaj <b>{{ Auth::user()->name ?? '' }}</b></h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <img src="{{ url('/assets/admin_panel.png') }}"
                                                     alt="Panel administratora" width="30%">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>Ostatnie logowanie:
                                                    <strong>{{ Auth::user()->last_login_at ?? '' }}</strong></p>
                                                @can('admin-level')
                                                    <p>IP:<strong>{{ Auth::user()->last_login_ip ?? '' }}</strong></p>
                                                @endcan
                                            </div>
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
