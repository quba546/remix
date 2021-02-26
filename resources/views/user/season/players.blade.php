@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3" >
                    <h2 class="text-uppercase font-weight-bold mt-3">Kadra</h2>
                    <hr class="hr-text">
                    <img src="{{ url('/assets/zdjecie_druzyny_2017_2018.jpg') }}" alt="Zdjęcie drużyny z sezonu 2017/2018"
                         class="align-items-center mt-5 mb-4 border border-success shadow-lg" width="80%">
                    <table class="table table-sm table-striped table-responsive-md table-bordered table-font">
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
                            <th class="text-center align-middle">Szczegóły</th>
                        </tr>
                        </thead>
                        <tbody class="table-light">
                        @foreach($players ?? [] as $player)
                            <tr>
                                <td class="text-center align-middle">{{ ($players->currentPage() - 1) * $players->perPage() + $loop->index + 1 }}</td>
                                <td class="text-center align-middle">{{ $player->nr }}</td>
                                <td class="text-center align-middle text-uppercase">{{ $player->last_name }}</td>
                                <td class="text-center align-middle">{{ $player->first_name }}</td>
                                <td class="text-center align-middle">{{ $player->position }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('season.players.show', ['player' => $player->id]) }}" class="btn btn-outline-success">Profil</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12 col-lg-2 text-center pt-3">
                            {{ $players->appends(request()->query())->links() }}
                        </div>
                        <div class="col-12 col-lg-10 text-left d-flex align-items-center">
                            @if (isset($players))
                                <span>Wyświetlono {{ ($players->currentPage() - 1) * $players->perPage() + 1 }} - @if ($players->currentPage() === $players->lastPage()) {{ $players->total() }} @else {{ $players->currentPage() * $players->perPage() }} @endif z {{ $players->total() }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
