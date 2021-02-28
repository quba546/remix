@extends('layout.app')

@section('content')
    @include('shared.messages')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3" >
                    <h2 class="text-uppercase font-weight-bold mt-3">Kadra</h2>
                    <hr class="hr-text">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ url('/assets/zdjecie_druzyny_2017_2018.jpg') }}" class="w-100 border border-success" alt="Zdjęcie drużyny z baraży w sezonie 2017/2018">
                        </div>
                    </div>
                    <div class="row mt-5 mb-5">
                        <div class="col-12 mb-2">
                            <div class="player-list-text mt-2 mb-5 ">
                                <h3><strong>Trener</strong></h3>
                                <span class="text-uppercase">Niemczyk </span>
                                <span>Daniel</span>
                            </div>
                        </div>
{{--                    goalkeepers--}}
                        <div class="col-12 mb-2">
                            <h3><strong>Bramkarze</strong></h3>
                        </div>
                        @foreach ($goalkeepers as $goalkeeper)
                        <div class="col-12 col-lg" data-aos="fade-down" data-aos-duration="1000">
                            <a href="{{ route('season.players.show', ['player' => $goalkeeper->id]) }}">
                                <div class="circular--portrait-players-list">
                                    <img src="{{ isset($goalkeeper->image)? asset('storage/' . $goalkeeper->image) : asset('/storage/blank-profile-picture.png') }}" class="img-scorer" alt="Zdjęcie gracza">
                                </div>
                            </a>
                            <div class="player-list-text mt-2 mb-3 mb-lg-1">
                                <span class="text-uppercase">{{ $goalkeeper->last_name ?? '' }} </span>
                                <span>{{ $goalkeeper->first_name ?? '' }}</span>
                                <br>
                                @if ($goalkeeper->nr)
                                <span><i class="fas fa-tshirt"></i> {{ $goalkeeper->nr ?? '' }}</span>
                                <br>
                                @endif
                                <span><i class="fas fa-stopwatch"></i> {{ $goalkeeper->played_matches ?? '' }}</span>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12">
                            <hr class="hr-text">
                        </div>
{{--                    defenders--}}
                        <div class="col-12 mt-4 mb-2">
                            <h3><strong>Obrońcy</strong></h3>
                        </div>
                        @foreach ($defenders as $defender)
                            <div class="col-12 col-lg" data-aos="zoom-in-down" data-aos-duration="1000">
                                <a href="{{ route('season.players.show', ['player' => $defender->id]) }}">
                                    <div class="circular--portrait-players-list">
                                        <img src="{{ isset($defender->image)? asset('storage/' . $defender->image) : asset('/storage/blank-profile-picture.png') }}" class="img-scorer" alt="Zdjęcie gracza">
                                    </div>
                                </a>
                                <div class="player-list-text mt-2 mb-3 mb-lg-1">
                                    <span class="text-uppercase">{{ $defender->last_name ?? '' }} </span>
                                    <span>{{ $defender->first_name ?? '' }}</span>
                                    <br>
                                    @if ($defender->nr)
                                        <span><i class="fas fa-tshirt"></i> {{ $defender->nr ?? '' }}</span>
                                        <br>
                                    @endif
                                    <span><i class="fas fa-stopwatch"></i> {{ $defender->played_matches ?? '' }}</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12">
                            <hr class="hr-text">
                        </div>
{{--                    midfielders--}}
                        <div class="col-12 mt-4 mb-2">
                            <h3><strong>Pomocnicy</strong></h3>
                        </div>
                        @foreach ($midfielders as $midfielder)
                            <div class="col-12 col-lg" data-aos="zoom-in-up" data-aos-duration="1000">
                                <a href="{{ route('season.players.show', ['player' => $midfielder->id]) }}">
                                    <div class="circular--portrait-players-list">
                                        <img src="{{ isset($midfielder->image)? asset('storage/' . $midfielder->image) : asset('/storage/blank-profile-picture.png') }}" class="img-scorer" alt="Zdjęcie gracza">
                                    </div>
                                </a>
                                <div class="player-list-text mt-2 mb-3 mb-lg-1">
                                    <span class="text-uppercase">{{ $midfielder->last_name ?? '' }} </span>
                                    <span>{{ $midfielder->first_name ?? '' }}</span>
                                    <br>
                                    @if ($midfielder->nr)
                                        <span><i class="fas fa-tshirt"></i> {{ $midfielder->nr ?? '' }}</span>
                                        <br>
                                    @endif
                                    <span><i class="fas fa-stopwatch"></i> {{ $midfielder->played_matches ?? '' }}</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12">
                            <hr class="hr-text">
                        </div>
{{--                    strikers--}}
                        <div class="col-12 mt-4 mb-2">
                            <h3><strong>Napastnicy</strong></h3>
                        </div>
                        @foreach ($strikers as $striker)
                            <div class="col-12 col-lg" data-aos="fade-up" data-aos-duration="1000">
                                <a href="{{ route('season.players.show', ['player' => $striker->id]) }}">
                                    <div class="circular--portrait-players-list">
                                        <img src="{{ isset($striker->image)? asset('storage/' . $striker->image) : asset('/storage/blank-profile-picture.png') }}" class="img-scorer" alt="Zdjęcie gracza">
                                    </div>
                                </a>
                                <div class="player-list-text mt-2 mb-3 mb-lg-1">
                                    <span class="text-uppercase">{{ $striker->last_name ?? '' }} </span>
                                    <span>{{ $striker->first_name ?? '' }}</span>
                                    <br>
                                    @if ($striker->nr)
                                        <span><i class="fas fa-tshirt"></i> {{ $striker->nr ?? '' }}</span>
                                        <br>
                                    @endif
                                    <span><i class="fas fa-stopwatch"></i> {{ $striker->played_matches ?? '' }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
