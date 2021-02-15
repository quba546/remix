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
                                <th colspan="8" class="text-center align-middle text-uppercase">{{ $table[0]->league_name ?? '' }}</th>
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
                        @foreach($table ?? [] as $row)
                            <tr>
                                <td class="text-center align-middle">{{ $row->place }}</td>
                                <td class="text-center align-middle">{{ $row->team_name }}</td>
                                <td class="text-center align-middle">{{ $row->played_matches }}</td>
                                <td class="text-center align-middle font-weight-bold">{{ $row->points }}</td>
                                <td class="text-center align-middle">{{ $row->wins }}</td>
                                <td class="text-center align-middle">{{ $row->draws }}</td>
                                <td class="text-center align-middle">{{ $row->defeats }}</td>
                                <td class="text-center align-middle">{{ $row->goal_ratio }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
