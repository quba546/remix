@extends('layout.app')

@section('content')
    <div class="d-flex" id="wrapper">
    @include('shared.sidebar-admin')
    <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <i class="fas fa-bars toggle-admin-icon" id="menu-toggle"></i>
            </nav>
            @include('shared.messages')
            @error('playedMatches')
                <div class="alert alert-danger m-3">{{ $message }}</div>
            @enderror
            <div class="container-fluid">
                <div class="row mt-5 mb-5">
                    <div class="col-1 col-lg-2"></div>
                    <div class="col-8 bg-white shadow-lg text-center">
                        <h2 class="text-uppercase font-weight-bold mt-3">Lista zawodników</h2>
                        <hr>
                        <table class="table table-sm table-responsive-lg table-striped table-bordered mt-4 table-font">
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
                                    @sortablelink('first_name' , '')</th>
                                <th class="text-center align-middle">
                                    Pozycja
                                    @sortablelink('position' , '')
                                </th>
                                <th class="text-center align-middle">
                                    Rozegrane mecze
                                    @sortablelink('played_matches' , '')
                                </th>
                                <th class="text-center align-middle">Opcje</th>
                                <th class="text-center align-middle">
                                    Ostatnia aktualizacja
                                    @sortablelink('updated_at' , '')
                                </th>
                            </tr>
                            </thead>
                            <tbody class="table-light">
                            @foreach($players ?? [] as $player)
                                <tr>
                                    <td class="text-center align-middle">{{ ($players->currentpage() - 1) * $players->perpage() + $loop->index + 1 }}</td>
                                    <td class="text-center align-middle">{{ $player->nr }}</td>
                                    <td class="text-center align-middle text-uppercase">{{ $player->last_name }}</td>
                                    <td class="text-center align-middle">{{ $player->first_name }}</td>
                                    <td class="text-center align-middle">{{ $player->position }}</td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('admin.players.update.playedMatches') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-row">
                                                <div class="col-12 col-xl-8">
                                                    <input type="number" name="playedMatches" value="{{ $player->played_matches ?? 0 }}" class="form-control" placeholder="0" min="0" step="1" required>
                                                    <input type="hidden" name="playerId" value="{{ $player->id }}">
                                                </div>
                                                <div class="col-12 col-xl-4 mt-2 m-xl-0">
                                                    <button type="submit" class="btn btn-outline-success">Zapisz</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="{{ route('admin.players.edit', ['player' => $player->id]) }}" class="btn btn-outline-info">Szczegóły</a>
                                    </td>
                                    <td class="text-center align-middle">{{ \Carbon\Carbon::parse($player->updated_at)->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12 col-lg-2 text-center pt-3">
                                {{ $players->appends(request()->query())->links() }}
                            </div>
                            <div class="col-12 col-lg-10 text-left d-flex align-items-center">
                                @if ($players->total() !== 0)
                                    <span>Wyświetlono {{ ($players->currentPage() - 1) * $players->perPage() + 1 }} - @if ($players->currentPage() === $players->lastPage()) {{ $players->total() }} @else {{ $players->currentPage() * $players->perPage() }} @endif z {{ $players->total() }}</span>
                                @endif
                            </div>
                        </div>
                        <button type="button" id="add-player-btn" class="btn btn-outline-success mt-2 mb-4">Dodaj zawodnika</button>
                        <div id="add-player" class="border border-success rounded m-4">
                            <h5 class="mt-2 font-weight-bold">Dodaj zawodnika</h5>
                            <hr>
                            <form action="{{ route('admin.players.store') }}" method="POST">
                                @csrf
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-6">
                                        <label for="firstName">Imię</label>
                                        <input type="text" name="firstName" value="{{ old('firstName') }}" class="form-control @error('firstName') is-invalid @enderror" id="firstName" placeholder="Imię" size="50" required>
                                        @error('firstName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastName">Nazwisko</label>
                                        <input type="text" name="lastName" value="{{ old('lastName') }}" class="form-control @error('lastName') is-invalid @enderror" id="lastName" placeholder="Nazwisko" size="50" required>
                                        @error('lastName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-6">
                                        <label for="position">Pozycja</label>
                                        <select name="position" class="form-control @error('position') is-invalid @enderror" id="position" required>
                                            <option selected disabled value="">Wybierz...</option>
                                            <option value="bramkarz">bramkarz</option>
                                            <option value="obrońca">obrońca</option>
                                            <option value="pomocnik">pomocnik</option>
                                            <option value="napastnik">napastnik</option>
                                        </select>
                                        @error('position')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="number">Numer</label>
                                        <input type="number" name="number" value="{{ old('number') }}" class="form-control @error('number') is-invalid @enderror" id="number" min="1" step="1" max="99">
                                        @error('number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" name="form-create-player" class="btn btn-outline-success mb-3">Dodaj</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-1 col-lg-2"></div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection
