@extends('layout.app')

@section('content')
    <div class="row mx-auto pt-5 pb-5">
        <div class="col-12 col-xl-4 pl-xl-5">
            <aside>
                <table class="table table-sm table-striped table-bordered shadow-lg table-standing-font">
                    <thead class="thead-dark">
                    <tr>
                        <th colspan="4" class="text-center align-middle text-uppercase">{{ $shortStanding[0]->league ?? '' }}</th>
                    </tr>
                    <tr>
                        <th class="text-center align-middle">Pozycja</th>
                        <th class="text-center align-middle">Nazwa</th>
                        <th class="text-center align-middle">Mecze</th>
                        <th class="text-center align-middle">Punkty</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                    @foreach($shortStanding ?? [] as $row)
                        <tr>
                            <td class="text-center align-middle {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->position }}</td>
                            <td class="text-center align-middle {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->team }}</td>
                            <td class="text-center align-middle {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->played_matches }}</td>
                            <td class="text-center align-middle font-weight-bold {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->points }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </aside>
        </div>
        <div class="col-12 col-xl-4 text-center">
            <div id="fb-widget"></div>
        </div>
        <div class="col-12 col-xl-4 pr-xl-5">
            <aside>
                <table class="table table-sm table-borderless shadow-lg table-font">
                    <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th colspan="3" scope="col" class="text-center align-middle text-uppercase letter-spacing-1">Ostatni mecz</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                    <tr>
                        <td class="text-center align-middle"><i class="fas fa-futbol table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle font-weight-bold">{{ $lastMatch->matchType->type ?? '' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="far fa-calendar-alt table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">{{ $lastMatch->match_type_id === 2 ? $lastMatch->date : 'Kolejka ' . $lastMatch->round . ' - ' . $lastMatch->date }}</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="far fa-handshake table-icon"></i></td>
                        <td class="text-center text-md-right align-middle font-weight-bold table-team-name">{{ $lastMatch->host ?? '' }}</td>
                        <td class="text-center align-middle font-weight-bold">━</td>
                        <td class="text-center text-md-left align-middle font-weight-bold table-team-name">{{ $lastMatch->guest ?? '' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="fas fa-trophy table-icon"></i></td>
                        <td  colspan="3" class="text-center font-weight-bold table-score">{{ $lastMatch->score ?? '' }}</td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-sm table-borderless shadow-lg mt-5 table-font">
                    <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th colspan="3" scope="col" class="text-center align-middle text-uppercase letter-spacing-1">Najbliższy mecz</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                    <tr>
                        <td class="text-center align-middle"><i class="fas fa-futbol table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle font-weight-bold">{{ $upcomingMatch->matchType->type ?? '' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="far fa-calendar-alt table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">{{ $upcomingMatch->match_type_id === 2 ? $upcomingMatch->date : 'Kolejka ' . $upcomingMatch->round . ' - ' . $upcomingMatch->date }}</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="far fa-handshake table-icon"></i></td>
                        <td class="text-center text-md-right align-middle font-weight-bold table-team-name">{{ $upcomingMatch->host ?? '' }}</td>
                        <td class="text-center align-middle font-weight-bold">━</td>
                        <td class="text-center text-md-left align-middle font-weight-bold table-team-name">{{ $upcomingMatch->guest ?? '' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="fas fa-map-marked table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">{{ $upcomingMatch->place ?? '' }}</td>
                    </tr>
                    </tbody>
                </table>
            </aside>
        </div>
    </div>
    <div class="row mx-auto bg-white mt-3">
        <div class="col-12 text-center mt-5">
            <h2 class="text-uppercase">Najlepsi strzelcy klubu</h2>
            <hr class="hr-text">
        </div>
        <div class="col-12 col-lg-4 order-2 order-lg-1 text-center mt-5 mt-lg-0">
            <div class="second-place"></div>
            <div class="best-scorer-details mb-2">
                <span class="best-scorer-place font-weight-bold">2nd</span>
                <br>
                <i class="fas fa-medal best-scorer-icon-2"></i>
            </div>
            <div class="circular--portrait">
                <img src="{{ isset($bestScorers[1]['image']) ? asset('storage/' . $bestScorers[1]['image']) : asset('storage/blank-profile-picture.png') }}" class="border border-dark img-scorer" alt="Zdjęcie gracza">
            </div>
            <div class="best-scorer-stats mt-4">
                <span class="text-uppercase">{{ $bestScorers[1]['last_name'] }} </span><span>{{ $bestScorers[1]['first_name'] }}</span>
                <br>
                <span>{{ $bestScorers[1]['goals'] }} <i class="fas fa-futbol"></i></span>
            </div>
        </div>
        <div class="col-12 col-lg-4 order-1 order-lg-2 text-center">
            <div class="best-scorer-details mb-2">
                <span class="best-scorer-place font-weight-bold">1st</span>
                <br>
                <i class="fas fa-medal best-scorer-icon-1"></i>
            </div>
            <div class="circular--portrait">
                <img src="{{ isset($bestScorers[0]['image']) ? asset('storage/' . $bestScorers[0]['image']) : asset('storage/blank-profile-picture.png') }}" class="border border-dark img-scorer" alt="Zdjęcie gracza">
            </div>
            <div class="best-scorer-stats mt-4">
                <span class="text-uppercase">{{ $bestScorers[0]['last_name'] }} </span><span>{{ $bestScorers[0]['first_name'] }}</span>
                <br>
                <span>{{ $bestScorers[0]['goals'] }}  <i class="fas fa-futbol"></i></span>
            </div>
        </div>
        <div class="col-12 col-lg-4 order-3 order-lg-3 text-center mt-5 mt-lg-0 mb-5">
            <div class="third-place"></div>
            <div class="best-scorer-details mb-2">
                <span class="best-scorer-place font-weight-bold">3rd</span>
                <br>
                <i class="fas fa-medal best-scorer-icon-3"></i>
            </div>
            <div class="circular--portrait">
                <img src="{{ isset($bestScorers[2]['image']) ? asset('storage/' . $bestScorers[2]['image']) : asset('storage/blank-profile-picture.png') }}" class="border border-dark img-scorer" alt="Zdjęcie gracza">
            </div>
            <div class="best-scorer-stats mt-4">
                <span class="text-uppercase">{{ $bestScorers[2]['last_name'] }} </span><span>{{ $bestScorers[2]['first_name'] }} </span>
                <br>
                <span>{{ $bestScorers[2]['goals'] }}  <i class="fas fa-futbol"></i></span>
            </div>
        </div>
    </div>
    <div class="row mx-auto bg-light pt-5 pb-5">
        <div class="col-12 text-center">
            <h2 class="text-uppercase">Główny sponsor klubu</h2>
            <hr class="hr-text" data-content="DRUCZEK SANOK">
            <a href="https://pl-pl.facebook.com/druczekleskoo/" target="_blank"><img src="{{ url('/assets/druczek-logo.png') }}" alt="Druczek Sanok logo" height="100px"></a>
            <br>
            <hr class="hr-text">
        </div>
    </div>
@endsection
