@extends('layout.main')

@section('dashboard')
    <div class="row mr-lg-auto mx-auto bg-white">
        <div class="col-12 col-lg-3 col-xl-2 mt-3 mb-3">
            @include('shared.admin-sidebar')
        </div>
        <div class="col-12 col-lg-9 col-xl-10 mt-3 mb-3 text-center">
            <h2>Dashboard</h2>
        </div>
    </div>
@endsection
