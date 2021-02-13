@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="p-3">
                    <h2>Tabela</h2>
                    <table class="table table-sm table-responsive-lg table-striped table-hover table-bordered table-home-font">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="8" class="text-center align-middle text-uppercase">Klasa A 2020/2021, grupa: Krosno I</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle">Pozycja</th>
                                <th class="text-center align-middle">Nazwa</th>
                                <th class="text-center align-middle">Mecze</th>
                                <th class="text-center align-middle">Punkty</th>
                                <th class="text-center align-middle">Zwycięstwa</th>
                                <th class="text-center align-middle">Remisy</th>
                                <th class="text-center align-middle">Porażki</th>
                                <th class="text-center align-middle">Bramki</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                            <tr>
                                <td class="text-center align-middle">1</td>
                                <td class="text-center align-middle">Remix Niebieszczany</td>
                                <td class="text-center align-middle">14</td>
                                <td class="text-center align-middle font-weight-bold">12</td>
                                <td class="text-center align-middle">3</td>
                                <td class="text-center align-middle">3</td>
                                <td class="text-center align-middle">8</td>
                                <td class="text-center align-middle">22-37</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
