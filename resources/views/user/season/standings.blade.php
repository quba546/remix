@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3">
                    <h2 class="text-uppercase font-weight-bold mt-3">Tabela</h2>
                    <hr class="hr-text">
                    <table class="table table-sm table-responsive-lg table-striped table-bordered table-font mt-5">
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
                                <td class="text-center align-middle {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->position }}</td>
                                <td class="text-center align-middle {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->team }}</td>
                                <td class="text-center align-middle {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->played_matches }}</td>
                                <td class="text-center align-middle font-weight-bold {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->points }}</td>
                                <td class="text-center align-middle {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->wins }}</td>
                                <td class="text-center align-middle {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->draws }}</td>
                                <td class="text-center align-middle {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->losses }}</td>
                                <td class="text-center align-middle {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->goals_scored }}</td>
                                <td class="text-center align-middle {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->goals_conceded }}</td>
                                <td class="text-center align-middle {{ $loop->first ? 'bg-green' : '' }} {{ $loop->last ? 'bg-red' : '' }}">{{ $row->goals_difference }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
