@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="p-3">
                    <h2>Statystyki zawodników</h2>
                    <table class="table table-sm table-responsive-lg table-striped table-hover table-bordered table-home-font">
                        <thead class="thead-dark">
                        <tr>
                            <th class="text-center align-middle">Nr</th>
                            <th class="text-center align-middle">Imię</th>
                            <th class="text-center align-middle">Nazwisko</th>
                            <th class="text-center align-middle">Pozycja</th>
                            <th class="text-center align-middle">Bramki</th>
                            <th class="text-center align-middle">Asysty</th>
                            <th class="text-center align-middle">Czyste konta</th>
                            <th class="text-center align-middle">Żółte kartki</th>
                            <th class="text-center align-middle">Czerwone kartki</th>
                            <th class="text-center align-middle">Rozegrane mecze</th>
                        </tr>
                        </thead>
                        <tbody class="table-light">
                        <tr>
                            <td class="text-center align-middle">8</td>
                            <td class="text-center align-middle">Jan</td>
                            <td class="text-center align-middle">Kowalski</td>
                            <td class="text-center align-middle">obrońca</td>
                            <td class="text-center align-middle">10</td>
                            <td class="text-center align-middle">5</td>
                            <td class="text-center align-middle">0</td>
                            <td class="text-center align-middle">4</td>
                            <td class="text-center align-middle">1</td>
                            <td class="text-center align-middle">20</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
