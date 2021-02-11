@extends('layout.main')

@section('home')
    <div class="row mx-auto pt-5 pb-5">
        <div class="col-12 col-xl-3">
            <aside>
                <table class="table table-sm table-borderless shadow-lg table-home-font">
                    <thead class="thead-dark">
                    <tr>
                        <th colspan="4" scope="col" class="text-center align-middle text-uppercase">Ostatni mecz</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
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
                        <th colspan="4" scope="col" class="text-center align-middle text-uppercase">Najbliższy mecz</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
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
        <div class="col-12 col-xl-6 text-center">
            <div id="fb-widget"></div>
        </div>
        <div class="col-12 col-xl-3">
            <aside>
                <table class="table table-sm table-striped shadow-lg table-home-font">
                    <thead class="thead-dark">
                    <tr>
                        <th colspan="4" class="text-center align-middle text-uppercase">Klasa A 2020/2021, grupa: Krosno I</th>
                    </tr>
                    <tr>
                        <th class="text-center align-middle">Pozycja</th>
                        <th class="text-center align-middle">Nazwa</th>
                        <th class="text-center align-middle">Mecze</th>
                        <th class="text-center align-middle">Punkty</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                    <tr>
                        <td class="text-center align-middle">1</td>
                        <td class="text-center align-middle">REMIX Niebieszczany</td>
                        <td class="text-center align-middle">14</td>
                        <td class="text-center align-middle">32</td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-sm table-striped shadow-lg mt-4 table-home-font">
                    <thead class="thead-dark">
                    <tr>
                        <th colspan="3" scope="col" class="text-center align-middle text-uppercase">Najlepsi strzelcy</th>
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
            <img src="/" alt="Druczek Sanok logo">
            <br>
            <hr class="hr-text">
        </div>
    </div>
@endsection
