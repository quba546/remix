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
                    <div class="col-10 col-lg-8 bg-white shadow-lg text-center">
                        <h2 class="text-uppercase font-weight-bold mt-3">Szczegóły zawdodnika</h2>
                        <div class="border border-success rounded m-4">
                            <h5 class="mt-2 font-weight-bold">Edytuj dane zawodnika</h5>
                            <hr>
                            <form action="{{ route('admin.players.update', ['player' => $player->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row ml-2 mr-2">
                                    <div class="container form-group col-md-6">
                                        <div class="row mx-auto justify-content-center align-items-start mt-4">
                                            <div class="col-12 col-lg-7">
                                                <div class="player-img">
                                                    <img src="{{ $player->image ? asset('storage/' . $player->image) : asset('storage/blank-profile-picture.png') }}" alt="Zdjęcie gracza">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex col-12 d-xl-none mt-4">
                                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image-add-mobile" accept="image/*">
                                        <label class="custom-file-label text-left" for="image">Wybierz zdjęcie</label>
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-xl-6">
                                        <label for="id" class="mb-0">ID</label>
                                        <input readonly type="text" name="id" value="{{ $player->id ?? '' }}" class="form-control" id="id">

                                        <label for="lastName" class="mb-0 mt-3">Nazwisko</label>
                                        <input type="text" name="lastName" value="{{ old('lastName') ?? $player->last_name ?? '' }}" class="form-control @error('lastName') is-invalid @enderror" id="lastName" placeholder="Nazwisko" size="50" required>
                                        @error('lastName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="firstName" class="mb-0 mt-3">Imię</label>
                                        <input type="text" name="firstName" value="{{ old('firstName') ?? $player->first_name ?? '' }}" class="form-control @error('firstName') is-invalid @enderror" id="firstName" placeholder="Imię" size="50" required>
                                        @error('firstName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="position" class="mb-0 mt-3">Pozycja</label>
                                        <select name="position" class="custom-select" id="position" required>
                                            @php $position = $player->position ?? '' @endphp
                                            <option selected value="{{ $position }}">{{ $position }}</option>
                                            <option value="none">Wybierz pozycję...</option>
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
                                    <div class="form-group d-none d-xl-flex col-lg-6 mt-4">
                                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image-add-desktop" accept="image/*">
                                        <label class="custom-file-label text-left" for="image">Wybierz zdjęcie</label>
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-xl-6">
                                        <label for="number" class="mb-0">Numer</label>
                                        <input type="number" name="number" value="{{ old('number') ?? $player->nr ?? '' }}" class="form-control @error('number') is-invalid @enderror" id="number" min="1" step="1" max="99">
                                        @error('number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-4">
                                        <label for="playedMatches" class="mb-0">Rozegrane mecze</label>
                                        <input type="number" name="playedMatches" value="{{ old('playedMatches') ?? $player->played_matches ?? '' }}" class="form-control @error('playedMatches') is-invalid @enderror" id="playedMatches" placeholder="0" min="0" step="1">
                                        @error('playedMatches')
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
                                        <input type="number" name="cleanSheets" value="{{ old('cleanSheets') ?? $player->clean_sheets ?? '' }}" class="form-control @error('cleanSheets') is-invalid @enderror" id="cleanSheets" placeholder="0" min="0" step="1">
                                        @error('cleanSheets')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="yellowCards" class="mb-0">Żółte kartki</label>
                                        <input type="number" name="yellowCards" value="{{ old('yellowCards') ?? $player->yellow_cards ?? '' }}" class="form-control @error('yellowCards') is-invalid @enderror" id="yellowCards" placeholder="0" min="0" step="1">
                                        @error('yellowCards')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="redCards" class="mb-0">Czerwone kartki</label>
                                        <input type="number" name="redCards" value="{{ old('redCards') ?? $player->red_cards ?? '' }}" class="form-control @error('redCards') is-invalid @enderror" id="redCards" placeholder="0" min="0" step="1">
                                        @error('redCards')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-6">
                                        <label for="createdAt" class="mb-0">Utworzono</label>
                                        <input readonly type="text" name="createdAt" value="{{ \Carbon\Carbon::parse($player->created_at ?? '')->format('d-m-Y G:i:s') }}" class="form-control" id="createdAt">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="updatedAt" class="mb-0">Ostatnio edytowano</label>
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
                                <div class="form-group col-6 d-flex justify-content-start">
                                    <form action="{{ route('admin.players.destroy.image', ['player' => $player->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Czy na pewno chcesz usunąć zdjęcie zawodnika?')" class="btn btn-outline-danger">Usuń zdjęcie</button>
                                    </form>
                                </div>
                                <div class="form-group col-6 d-flex justify-content-end">
                                    <form action="{{ route('admin.players.destroy', ['player' => $player->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Czy na pewno chcesz usunąć zawodnika?')" class="btn btn-outline-danger">Usuń</button>
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
