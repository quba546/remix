@extends('layout.app')

@section('content')
    <x-admin-pages-template title="Dashboard" cardHeader="Strona główna">
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
    </x-admin-pages-template>
@endsection
