@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3">
                    <h2 class="text-uppercase font-weight-bold mt-3">Statystyki zawodników</h2>
                    <table class="table table-sm table-responsive-lg table-striped table-bordered table-home-font">
                        <thead class="thead-dark">
                        <tr>
                            <th class="text-center align-middle">Lp.</th>
                            <th class="text-center align-middle">Nr</th>
                            <th class="text-center align-middle">Nazwisko</th>
                            <th class="text-center align-middle">Imię</th>
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
                        @foreach($playersStats ?? [] as $playerStats)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle">{{ $playerStats->nr }}</td>
                                <td class="text-center align-middle text-uppercase">{{ $playerStats->last_name }}</td>
                                <td class="text-center align-middle">{{ $playerStats->first_name }}</td>
                                <td class="text-center align-middle">{{ $playerStats->position }}</td>
                                <td class="text-center align-middle">{{ $playerStats->goals }}</td>
                                <td class="text-center align-middle">{{ $playerStats->assists }}</td>
                                <td class="text-center align-middle">{{ $playerStats->clean_sheets }}</td>
                                <td class="text-center align-middle">{{ $playerStats->yellow_cards }}</td>
                                <td class="text-center align-middle">{{ $playerStats->red_cards }}</td>
                                <td class="text-center align-middle">{{ $playerStats->played_matches }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $playersStats->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
