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
            <div class="container-fluid mb-5">
                <div class="row mt-5">
                    <div class="col-1 col-lg-2"></div>
                    <div class="col-10 col-lg-8 bg-white shadow-lg text-center">
                        <h2 class="text-uppercase font-weight-bold mt-3">Profil zawdodnika</h2>
                        <hr>
                        <div class="border border-success rounded m-4">
                            <h5 class="mt-2 font-weight-bold">Edytuj dane zawodnika</h5>
                            <hr>
                            <form action="{{ route('admin.players.update', ['player' => $player->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row ml-2 mr-2">
                                    <div class="container form-group col-md-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="circular--portrait">
                                                    <img src="{{ isset($player->image) ? asset('storage/' . $player->image) : asset('storage/blank-profile-picture.png') }}" class="img-scorer" alt="Zdjęcie gracza">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-xl-6">
                                        <label for="id" class="mb-0">ID</label>
                                        <input readonly type="text" name="id" value="{{ $player->id ?? '' }}" class="form-control" id="id">

                                        <label for="lastName" class="mb-0 mt-3">Nazwisko</label>
                                        <input type="text" name="last_name" value="{{ old('last_name') ?? $player->last_name ?? '' }}" class="form-control @error('last_name') is-invalid @enderror" id="lastName" placeholder="Nazwisko" size="50" required>
                                        @error('last_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="firstName" class="mb-0 mt-3">Imię</label>
                                        <input type="text" name="first_name" value="{{ old('first_name') ?? $player->first_name ?? '' }}" class="form-control @error('first_name') is-invalid @enderror" id="firstName" placeholder="Imię" size="50" required>
                                        @error('first_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="position" class="mb-0 mt-3">Pozycja</label>
                                        <select name="position" class="form-control" id="position" required>
                                            @php $position = $player->position ?? '' @endphp
                                            <option selected value="{{ $position }}">{{ $position }}</option>
                                            <option disabled value="">Wybierz...</option>
                                            @if($position !== 'bramkarz') <option value="bramkarz">bramkarz</option> @endif
                                            @if($position !== 'obrońca') <option value="obrońca">obrońca</option> @endif
                                            @if($position !== 'pomocnik') <option value="pomocnik">pomocnik</option> @endif
                                            @if($position !== 'napastnik') <option value="napastnik">napastnik</option> @endif
                                        </select>
                                        @error('position')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group order-1 order-xl-0 col-12 col-xl-6 mt-4">

{{--                                    uploading new photo to gallery--}}
                                        <div class="custom-file-upload">
                                            <input type="file" name="uploadedPhoto" id="uploadPhoto" data-max-files="1" required/>
                                        </div>

                                    </div>
                                    <div class="form-group col-12 col-xl-6">
                                        <label for="number" class="mb-0">Numer</label>
                                        <input type="number" name="nr" value="{{ old('nr') ?? $player->nr ?? '' }}" class="form-control @error('nr') is-invalid @enderror" id="number" min="1" step="1" max="99">
                                        @error('nr')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2 pt-2">
                                    <div class="form-group col-md-4">
                                        <label for="playedMatches" class="mb-0">Rozegrane mecze</label>
                                        <input type="number" name="played_matches" value="{{ old('played_matches') ?? $player->played_matches ?? '' }}" class="form-control @error('played_matches') is-invalid @enderror" id="playedMatches" placeholder="0" min="0" step="1">
                                        @error('played_matches')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="goals" class="mb-0">Bramki</label>
                                        <input type="number" name="goals" value="{{ old('goals') ?? $player->goals ?? '' }}" class="form-control @error('goals') is-invalid @enderror" id="goals" placeholder="0" min="0" step="1">
                                        @error('goals')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="assists" class="mb-0">Asysty</label>
                                        <input type="number" name="assists" value="{{ old('assists') ?? $player->assists ?? '' }}" class="form-control @error('assists') is-invalid @enderror" id="assists" placeholder="0" min="0" step="1">
                                        @error('assists')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-4">
                                        <label for="cleanSheets" class="mb-0">Czyste konta</label>
                                        <input type="number" name="clean_sheets" value="{{ old('clean_sheets') ?? $player->clean_sheets ?? '' }}" class="form-control @error('clean_sheets') is-invalid @enderror" id="cleanSheets" placeholder="0" min="0" step="1">
                                        @error('clean_sheets')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="yellowCards" class="mb-0">Żółte kartki</label>
                                        <input type="number" name="yellow_cards" value="{{ old('yellow_cards') ?? $player->yellow_cards ?? '' }}" class="form-control @error('yellow_cards') is-invalid @enderror" id="yellowCards" placeholder="0" min="0" step="1">
                                        @error('yellow_cards')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="redCards" class="mb-0">Czerwone kartki</label>
                                        <input type="number" name="red_cards" value="{{ old('red_cards') ?? $player->red_cards ?? '' }}" class="form-control @error('red_cards') is-invalid @enderror" id="redCards" placeholder="0" min="0" step="1">
                                        @error('red_cards')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-6">
                                        <label for="createdAt" class="mb-0">Utworzono</label>
                                        <input readonly type="text" name="created_at" value="{{ \Carbon\Carbon::parse($player->created_at ?? '')->format('d-m-Y G:i:s') }}" class="form-control" id="createdAt">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="updatedAt" class="mb-0">Ostatnio edytowano</label>
                                        <input readonly type="text" name="updated_at" value="{{ \Carbon\Carbon::parse($player->updated_at ?? '')->format('d-m-Y G:i:s') }}" class="form-control" id="updatedAt">
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-12">
                                        <button type="submit" class="btn btn-outline-success">Zapisz</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row m-2">
                                <div class="form-group col-12 col-lg-4 d-flex justify-content-center justify-content-lg-start mb-5 mb-lg-0">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#staticBackdropDeletePhoto">Usuń zdjęcie</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdropDeletePhoto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Potwierdzenie usunięcia zdjęcia zawodnika</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Czy na pewno chcesz usunąć zdjęcie tego zawodnika?</p>
                                                    <form action="{{ route('admin.players.destroy.image', ['player' => $player->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Zamknij</button>
                                                            <button type="submit" class="btn btn-outline-danger">Usuń zdjęcie</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-12 col-lg-4 d-flex justify-content-center justify-content-lg-center mb-5 mb-lg-0">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#staticBackdropRestoreDefaults">Zresetuj dane</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdropRestoreDefaults" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Zresetowanie danych</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Czy na pewno chcesz przywrócić domyślne wartości danych tego zawodnika?</p>
                                                    <form action="{{ route('admin.players.restore', ['player' => $player->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Zamknij</button>
                                                            <button type="submit" class="btn btn-outline-primary">Zresetuj dane</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-lg-4 d-flex justify-content-center justify-content-lg-end">
                                    @can('admin-level')

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#staticBackdropDeletePlayer">Usuń zawodnika</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdropDeletePlayer" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Usuwanie zawodnika</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Czy na pewno chcesz usunąć tego zawodnika?</p>
                                                        <form action="{{ route('admin.players.destroy', ['player' => $player->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Zamknij</button>
                                                                <button type="submit" class="btn btn-outline-danger">Usuń</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan
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
