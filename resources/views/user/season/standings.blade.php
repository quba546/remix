@extends('layout.app')

@section('content')
    <x-pages-template title="Tabela">
        @if ($standings->count() !== 0)
            <table class="table table-sm table-responsive-lg table-striped table-bordered table-font mt-5">
                <thead class="thead-dark">
                <tr>
                    <th colspan="10" class="text-center align-middle text-uppercase">{{ $league ?? '' }}</th>
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
                @foreach($standings as $row)
                    @if ($loop->iteration <= $numberOfPromotionTeams) @php $background = 'bg-green'; @endphp
                    @elseif ($loop->iteration >= $loop->count - $numberOfRelegationTeams + 1) @php $background = 'bg-red'; @endphp
                    @else @php $background = ''; @endphp
                    @endif
                    <tr>
                        <td class="text-center align-middle {{ $background }}">{{ $row->position }}</td>
                        <td class="text-center align-middle {{ $background }}">{{ $row->team }}</td>
                        <td class="text-center align-middle {{ $background }}">{{ $row->played_matches }}</td>
                        <td class="text-center align-middle font-weight-bold {{ $background }}">{{ $row->points }}</td>
                        <td class="text-center align-middle {{ $background }}">{{ $row->wins }}</td>
                        <td class="text-center align-middle {{ $background }}">{{ $row->draws }}</td>
                        <td class="text-center align-middle {{ $background }}">{{ $row->losses }}</td>
                        <td class="text-center align-middle {{ $background }}">{{ $row->goals_scored }}</td>
                        <td class="text-center align-middle {{ $background }}">{{ $row->goals_conceded }}</td>
                        <td class="text-center align-middle {{ $background }}">{{ $row->goals_difference }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="col-12 mb-5">
                <span class="font-16">Brak tabeli do wyświetlenia.</span>
            </div>
        @endif
    </x-pages-template>
@endsection
