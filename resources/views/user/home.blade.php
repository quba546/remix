@extends('layout.main')

@section('content')
    <div class="row mx-auto pt-5 pb-5">
        <div class="col-12 col-xl-4 pl-xl-5">
            <aside>
                <table class="table table-sm table-borderless shadow-lg table-home-font">
                    <thead class="thead-dark">
                    <tr>
                        <th colspan="4" scope="col" class="text-center align-middle text-uppercase letter-spacing-1">Ostatni mecz</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                    <tr>
                        <td class="text-center align-middle"><i class="fas fa-futbol table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">Mecz ligowy</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="far fa-calendar-alt table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">Kolejka 15 - 11.11.2020</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="far fa-handshake table-icon"></i></td>
                        <td class="text-center align-middle font-weight-bold table-team-name">LKS Rafhaus Długie</td>
                        <td class="text-center align-middle font-weight-bold">-</td>
                        <td class="text-center align-middle font-weight-bold table-team-name">REMIX Niebieszczany</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="fas fa-trophy table-icon"></i></td>
                        <td colspan="3" class="text-center font-weight-bold table-score">3-2</td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-sm table-borderless shadow-lg mt-4 table-home-font">
                    <thead class="thead-dark">
                    <tr>
                        <th colspan="4" scope="col" class="text-center align-middle text-uppercase letter-spacing-1">Najbliższy mecz</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                    <tr>
                        <td class="text-center align-middle"><i class="fas fa-futbol table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">Mecz ligowy</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="far fa-calendar-alt table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">Kolejka 15 - 11.11.2020</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="far fa-handshake table-icon"></i></td>
                        <td class="text-center align-middle font-weight-bold table-team-name">LKS Rafhaus Długie</td>
                        <td class="text-center align-middle font-weight-bold">-</td>
                        <td class="text-center align-middle font-weight-bold table-team-name">REMIX Niebieszczany</td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle"><i class="fas fa-map-marked table-icon"></i></td>
                        <td colspan="3" class="text-center align-middle">Długie</td>
                    </tr>
                    </tbody>
                </table>
            </aside>
        </div>
        <div class="col-12 col-xl-4 text-center">
            <div id="fb-widget"></div>
        </div>
        <div class="col-12 col-xl-4 pr-xl-5">
            <aside>
                <table class="table table-sm table-striped shadow-lg table-home-font">
                    <thead class="thead-dark">
                    <tr>
                        <th colspan="4" class="text-center align-middle text-uppercase">{{ $shortTable[0]->league_name ?? '' }}</th>
                    </tr>
                    <tr>
                        <th class="text-center align-middle">Pozycja</th>
                        <th class="text-center align-middle">Nazwa</th>
                        <th class="text-center align-middle">Mecze</th>
                        <th class="text-center align-middle">Punkty</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                    @foreach($shortTable ?? [] as $row)
                        <tr>
                            <td class="text-center align-middle">{{ $row->place }}</td>
                            <td class="text-center align-middle">{{ $row->team_name }}</td>
                            <td class="text-center align-middle">{{ $row->played_matches }}</td>
                            <td class="text-center align-middle">{{ $row->points }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <table class="table table-sm table-striped shadow-lg mt-4 table-home-font">
                    <thead class="thead-dark">
                    <tr>
                        <th colspan="3" scope="col" class="text-center align-middle text-uppercase letter-spacing-1">Najlepsi strzelcy</th>
                    </tr>
                    <tr>
                        <th scope="col" class="text-center align-middle">Bramki</th>
                        <th scope="col" class="text-center align-middle">Imię</th>
                        <th scope="col" class="text-center align-middle">Nazwisko</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                    <tr>
                        <td class="text-center align-middle">10</td>
                        <td class="text-center align-middle">Jan</td>
                        <td class="text-center align-middle">Kowalski</td>
                    </tr>
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
