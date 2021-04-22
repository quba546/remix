@extends('layout.app')

@section('content')
    <x-pages-template title="Statystyki zawodników">
        @if ($playersStats->count() !== 0)
            <table class="table table-sm table-responsive-lg table-striped table-bordered table-font mt-5">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center align-middle">Lp.</th>
                    <th class="text-center align-middle">Nr</th>
                    <th class="text-center align-middle">
                        Nazwisko
                        @sortablelink('last_name' , '')
                    </th>
                    <th class="text-center align-middle">
                        Imię
                        @sortablelink('first_name' , '')
                    </th>
                    <th class="text-center align-middle">
                        Pozycja
                        @sortablelink('position' , '')
                    </th>
                    <th class="text-center align-middle">
                        Bramki
                        @sortablelink('goals' , '')
                    </th>
                    <th class="text-center align-middle">
                        Asysty
                        @sortablelink('assists' , '')
                    </th>
                    <th class="text-center align-middle">
                        Czyste konta
                        @sortablelink('clean_sheets' , '')
                    </th>
                    <th class="text-center align-middle">
                        Żółte kartki
                        @sortablelink('yellow_cards' , '')
                    </th>
                    <th class="text-center align-middle">
                        Czerwone kartki
                        @sortablelink('red_cards' , '')
                    </th>
                    <th class="text-center align-middle">
                        Rozegrane mecze
                        @sortablelink('played_matches' , '')
                    </th>
                </tr>
                </thead>
                <tbody class="table-light">
                @foreach($playersStats as $playerStats)
                    <tr>
                        <td class="text-center align-middle">{{ ($playersStats->currentpage()-1) * $playersStats->perpage() + $loop->index + 1 }}</td>
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
            @if ($playersStats->total() !== 0)
                <div class="row">
                    @if ($playersStats->total() >= $playersStats->perPage())
                        <div class="col-12 col-lg-2 text-center pt-3">
                            {{ $playersStats->appends(request()->query())->links() }}
                        </div>
                    @endif
                    <div class="col-12 col-lg-10 text-left d-flex align-items-center">
                        <span>Wyświetlono {{ ($playersStats->currentPage() - 1) * $playersStats->perPage() + 1 }} - @if ($playersStats->currentPage() === $playersStats->lastPage()) {{ $playersStats->total() }} @else {{ $playersStats->currentPage() * $playersStats->perPage() }} @endif z {{ $playersStats->total() }}</span>
                    </div>
                </div>
            @endif
        @else
            <div class="col-12 mb-5">
                <span class="font-16">Brak zawodników do wyświetlenia.</span>
            </div>
        @endif
    </x-pages-template>
@endsection
