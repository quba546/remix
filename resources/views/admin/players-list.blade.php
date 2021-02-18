@extends('layout.main')

@section('content')
    <div class="d-flex" id="wrapper">
    @include('shared.sidebar-admin')
    <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <i class="fas fa-bars toggle-admin-icon" id="menu-toggle"></i>
            </nav>
            @include('shared.messages')
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-1 col-lg-2"></div>
                    <div class="col-8 bg-white shadow-lg text-center">
                        <h2 class="text-uppercase font-weight-bold mt-3">Lista zawodników</h2>
                        <table class="table table-sm table-responsive-lg table-striped table-hover table-bordered mt-4 table-home-font">
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
                                        <form action="{{ route('admin.players.update', ['player' => $player->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="playedMatches" value="{{ $player->played_matches }}" placeholder="0" min="0">
                                            <button type="submit">Zapisz</button>
                                        </form>
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="{{ route('admin.players.edit', ['player' => $player->id]) }}">Szczegóły</a>
                                    </td>
                                    <td class="text-center align-middle">{{ $player->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $players->appends(request()->query())->links() }}
                        <button type="button" id="add-player-btn" class="btn btn-outline-success mt-2 mb-4">Dodaj zawodnika</button>
                        <div id="add-player" class="border border-success rounded m-4">
                            <h5 class="mt-2 font-weight-bold">Dodaj zawodnika</h5>
                            <hr>
                            <form action="{{ route('admin.players.store') }}" method="POST">
                                @csrf
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-6">
                                        <label for="firstName">Imię</label>
                                        <input type="text" name="firstName" value="" class="form-control" id="firstName" placeholder="Imię" size="20" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastName">Nazwisko</label>
                                        <input type="text" name="lastName" value="" class="form-control" id="lastName" placeholder="Nazwisko" size="30" required>
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-6">
                                        <label for="position">Pozycja</label>
                                        <select name="position" class="custom-select" id="position" required>
                                            <option value="bramkarz">bramkarz</option>
                                            <option value="obrońca">obrońca</option>
                                            <option value="pomocnik">pomocnik</option>
                                            <option value="napastnik">napastnik</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="number">Numer</label>
                                        <input type="number" name="number" value="" class="form-control" id="number" placeholder="99" step="1" min="1" max="99">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-success mb-3">Dodaj</button>
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
