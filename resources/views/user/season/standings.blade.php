@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="p-3">
                    <h2>Tabela</h2>
                    <table class="table table-sm table-responsive-lg table-striped table-bordered table-home-font">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="10" class="text-center align-middle text-uppercase">{{ $standings[0]->league ?? '' }}</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle">Pozycja</th>
                                <th class="text-center align-middle">Nazwa</th>
                                <th class="text-center align-middle">Mecze</th>
                                <th class="text-center align-middle">Punkty</th>
                                <th class="text-center align-middle">Zwycięstwa</th>
                                <th class="text-center align-middle">Remisy</th>
                                <th class="text-center align-middle">Porażki</th>
                                <th class="text-center align-middle">Bramki zdobyte</th>
                                <th class="text-center align-middle">Bramki stracone</th>
                                <th class="text-center align-middle">Różnica</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                        @foreach($standings ?? [] as $row)
                            <tr>
                                <td class="text-center align-middle">{{ $row->position }}</td>
                                <td class="text-center align-middle">{{ $row->team }}</td>
                                <td class="text-center align-middle">{{ $row->played_matches }}</td>
                                <td class="text-center align-middle font-weight-bold">{{ $row->points }}</td>
                                <td class="text-center align-middle">{{ $row->wins }}</td>
                                <td class="text-center align-middle">{{ $row->draws }}</td>
                                <td class="text-center align-middle">{{ $row->losses }}</td>
                                <td class="text-center align-middle">{{ $row->goals_scored }}</td>
                                <td class="text-center align-middle">{{ $row->goals_conceded }}</td>
                                <td class="text-center align-middle">{{ $row->goals_difference }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
