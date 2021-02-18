@extends('layout.main')

@section('content')
    <div class="row mx-auto pt-5 pb-5">
        <div class="col-12 col-xl-4 pl-xl-5">
            <aside>
                <table class="table table-sm table-striped table-bordered shadow-lg table-home-font">
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
                            <td class="text-center align-middle {{ $loop->first ? 'bg-success' : '' }} {{ $loop->last ? 'bg-danger' : '' }}">{{ $row->position }}</td>
                            <td class="text-center align-middle {{ $loop->first ? 'bg-success' : '' }} {{ $loop->last ? 'bg-danger' : '' }}">{{ $row->team }}</td>
                            <td class="text-center align-middle {{ $loop->first ? 'bg-success' : '' }} {{ $loop->last ? 'bg-danger' : '' }}">{{ $row->played_matches }}</td>
                            <td class="text-center align-middle font-weight-bold {{ $loop->first ? 'bg-success' : '' }} {{ $loop->last ? 'bg-danger' : '' }}">{{ $row->points }}</td>
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
                <table class="table table-sm table-borderless shadow-lg table-home-font">
                    <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th colspan="3" scope="col" class="text-center align-middle text-uppercase letter-spacing-1">Ostatni mecz</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                    <tr>
                        <td class="text-center align-middle"><i class="fas fa-futbol table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">{{ $lastMatch->matchType->type ?? '' }}</td>
                    </tr>
                    <tr>
                        @php $lastMatch->match_type_id ?? ''; $lastMatch->date ?? ''; $lastMatch->round ?? '' @endphp
                        <td class="text-center align-middle"><i class="far fa-calendar-alt table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">{{ $lastMatch->match_type_id === 2 ? $lastMatch->date : 'Kolejka ' . $lastMatch->round . ' - ' . $lastMatch->date }}</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="far fa-handshake table-icon"></i></td>
                        <td class="text-center align-middle font-weight-bold table-team-name">{{ $lastMatch->host ?? '' }}</td>
                        <td class="text-center align-middle font-weight-bold">-</td>
                        <td class="text-center align-middle font-weight-bold table-team-name">{{ $lastMatch->guest ?? '' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="fas fa-trophy table-icon"></i></td>
                        <td></td>
                        <td class="text-center font-weight-bold table-score">{{ $lastMatch->score ?? '' }}</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-sm table-borderless shadow-lg mt-5 table-home-font">
                    <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th colspan="3" scope="col" class="text-center align-middle text-uppercase letter-spacing-1">Najbliższy mecz</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                    <tr>
                        <td class="text-center align-middle"><i class="fas fa-futbol table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">{{ $upcomingMatch->matchType->type ?? '' }}</td>
                    </tr>
                    <tr>
                        @php $upcomingMatch->match_type_id ?? ''; $upcomingMatch->date ?? ''; $upcomingMatch->round ?? '' @endphp
                        <td class="text-center align-middle"><i class="far fa-calendar-alt table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">{{ $upcomingMatch->match_type_id === 2 ? $upcomingMatch->date : 'Kolejka ' . $upcomingMatch->round . ' - ' . $upcomingMatch->date }}</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="far fa-handshake table-icon"></i></td>
                        <td class="text-center align-middle font-weight-bold table-team-name">{{ $upcomingMatch->host ?? '' }}</td>
                        <td class="text-center align-middle font-weight-bold">-</td>
                        <td class="text-center align-middle font-weight-bold table-team-name">{{ $upcomingMatch->guest ?? '' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="fas fa-map-marked table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">{{ $upcomingMatch->place ?? '' }}</td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-sm table-striped table-bordered shadow-lg mt-5 table-home-font">
                    <thead class="thead-dark">
                    <tr>
                        <th colspan="3" scope="col" class="text-center align-middle text-uppercase letter-spacing-1">Najlepsi strzelcy</th>
                    </tr>
                    <tr>
                        <th scope="col" class="text-center align-middle">Bramki</th>
                        <th scope="col" class="text-center align-middle">Nazwisko</th>
                        <th scope="col" class="text-center align-middle">Imię</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                    @foreach($bestScorers ?? [] as $bestScorer)
                        <tr>
                            <td class="text-center align-middle">{{ $bestScorer->goals }}</td>
                            <td class="text-center align-middle text-uppercase">{{ $bestScorer->last_name }}</td>
                            <td class="text-center align-middle">{{ $bestScorer->first_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </aside>
        </div>
    </div>
    <div class="row mx-auto bg-white pt-3 pb-3">
        <div class="col-12 text-center">
            <h2>Główny sponsor klubu</h2>
            <hr class="hr-text" data-content="DRUCZEK SANOK">
            <a href="#" target="_blank"><img src="{{ url('/assets/druczek-logo.png') }}" alt="Druczek Sanok logo" height="100px"></a>
            <br>
            <hr class="hr-text">
        </div>
    </div>
@endsection
