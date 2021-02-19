@extends('layout.main')

@section('content')
    <div class="d-flex" id="wrapper">
    @include('shared.sidebar-admin')
    <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <i class="fas fa-bars toggle-admin-icon" id="menu-toggle"></i>
            </nav>
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-1 col-lg-2"></div>
                    <div class="col-10 col-lg-8 bg-white shadow-lg text-center">
                        <h2 class="text-uppercase font-weight-bold mt-3">Szczegóły zawdodnika</h2>
                        <div class="border border-success rounded m-4">
                            <h5 class="mt-2 font-weight-bold">Edytuj dane zawodnika</h5>
                            <hr>
                            @if (isset($player->id))
                                <form action="{{ route('admin.players.update', ['player' => $player->id]) }}" method="POST">
                            @else
                                @php abort(404, 'Błąd'); @endphp
                            @endif
                                @csrf
                                @method('PUT')
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-6">
                                        <div class="player-img">
                                            <img src="{{ $player->image ?? asset('storage/blank-profile-picture.png') }}" alt="Zdjęcie gracza">
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label text-left" for="customFile">Wybierz zdjęcie</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="id">ID</label>
                                        <input readonly type="text" name="id" value="{{ $player->id ?? '' }}" class="form-control" id="id">

                                        <label for="lastName" class="mt-2">Nazwisko</label>
                                        <input type="text" name="lastName" value="{{ $player->last_name ?? '' }}" class="form-control" id="lastName" placeholder="Nazwisko" size="30" required>

                                        <label for="firstName" class="mt-2">Imię</label>
                                        <input type="text" name="firstName" value="{{ $player->first_name ?? '' }}" class="form-control" id="firstName" placeholder="Imię" size="20" required>

                                        <label for="position" class="mt-2">Pozycja</label>
                                        <select name="position" class="custom-select" id="position" required>
                                            @php $position = $player->position ?? '' @endphp
                                            <option selected value="{{ $position }}">{{ $position }}</option>
                                            @if($position !== 'bramkarz') <option value="bramkarz">bramkarz</option> @endif
                                            @if($position !== 'obrońca') <option value="obrońca">obrońca</option> @endif
                                            @if($position !== 'pomocnik') <option value="pomocnik">pomocnik</option> @endif
                                            @if($position !== 'napastnik') <option value="napastnik">napastnik</option> @endif
                                        </select>

                                        <label for="number" class="mt-2">Numer</label>
                                        <input type="number" name="number" value="{{ $player->nr ?? '' }}" class="form-control" id="number" placeholder="99" step="1" min="1" max="99">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-4">
                                        <label for="playedMatches">Rozegrane mecze</label>
                                        <input type="number" name="playedMatches" value="{{ $player->played_matches ?? '' }}" class="form-control" id="playedMatches" placeholder="0" step="1" min="0">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="goals">Bramki</label>
                                        <input type="number" name="goals" value="{{ $player->goals ?? '' }}" class="form-control" id="goals" placeholder="0" step="1" min="0">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="assists">Asysty</label>
                                        <input type="number" name="assists" value="{{ $player->assists ?? '' }}" class="form-control" id="assists" placeholder="0" step="1" min="0">
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-4">
                                        <label for="cleanSheets">Czyste konta</label>
                                        <input type="number" name="cleanSheets" value="{{ $player->clean_sheets ?? '' }}" class="form-control" id="cleanSheets" placeholder="0" step="1" min="0">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="yellowCards">Żółte kartki</label>
                                        <input type="number" name="yellowCards" value="{{ $player->yellow_cards ?? '' }}" class="form-control" id="yellowCards" placeholder="0" step="1" min="0">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="redCards">Czerwone kartki</label>
                                        <input type="number" name="redCards" value="{{ $player->red_cards ?? '' }}" class="form-control" id="redCards" placeholder="0" step="1" min="0">
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-6">
                                        <label for="createdAt">Utworzono</label>
                                        <input readonly type="text" name="createdAt" value="{{ \Carbon\Carbon::parse($player->created_at ?? '')->format('d-m-Y G:i:s') }}" class="form-control" id="createdAt">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="updatedAt">Ostatnio edytowano</label>
                                        <input readonly type="text" name="updatedAt" value="{{ \Carbon\Carbon::parse($player->updated_at ?? '')->format('d-m-Y G:i:s') }}" class="form-control" id="updatedAt">
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-12">
                                        <button type="submit" class="btn btn-outline-success">Zapisz</button>
                                    </div>
                                </div>
                            </form>
                            <div class="form-row ml-2 mr-2">
                                <div class="form-group col-12 d-flex justify-content-end">
                                    <form action="{{ route('admin.players.destroy', ['player' => $player->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Czy na pewno chccesz usunąć zawodnika?')" class="btn btn-outline-danger">Usuń</button>
                                    </form>
                                </div>
                            </div>
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
