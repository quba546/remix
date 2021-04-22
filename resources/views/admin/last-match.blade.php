@extends('layout.app')

@section('content')
    <x-admin-pages-template title="Ostatni mecz" cardHeader="Edytuj dane">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.matches.last.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row ml-2 mr-2">
                            <div class="form-group col-md-6">
                                <label for="host">Gospodarz</label>
                                <input type="text" name="host"
                                       value="{{ old('lastName') ?? $lastMatch->host ?? '' }}"
                                       class="form-control @error('host') is-invalid @enderror"
                                       id="host" placeholder="Gospodarze" size="100" required>
                                @error('host')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="guest">Gość</label>
                                <input type="text" name="guest"
                                       value="{{ old('guest') ?? $lastMatch->guest ?? '' }}"
                                       class="form-control @error('guest') is-invalid @enderror"
                                       id="guest" placeholder="Goście" size="100" required>
                                @error('guest')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row ml-2 mr-2">
                            <div class="form-group col-md-12">
                                <label for="match-type">Rodzaj meczu</label>
                                <select class="form-control" name="match_type_id" id="match-type"
                                        required>
                                    @foreach($matchTypes ?? [] as $matchType)
                                        <option
                                            value="{{ $matchType->id }}">{{ $matchType->id === 2 ? $matchType->type : $matchType->type . ' - ' . $matchType->name }}</option>
                                    @endforeach
                                </select>
                                @error('matchType')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row ml-2 mr-2">
                            <div class="form-group col-md-6">
                                <div class="form-row">
                                    <div id="league-matches" class="form-group col-md-6">
                                        <label for="round">Kolejka</label>
                                        <input type="number" name="round"
                                               value="{{ old('round') ?? $lastMatch->round ?? '' }}"
                                               class="form-control @error('round') is-invalid @enderror"
                                               id="round" min="1" step="1" max="50" size="50">
                                        @error('round')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="date-div-toggler" class="form-group col-md-6">
                                        <label for="date">Data</label>
                                        <input type="date" name="date"
                                               value="{{ old('date') ?? $lastMatch->date ?? '' }}"
                                               class="form-control @error('date') is-invalid @enderror"
                                               id="date" required>
                                        @error('date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="score">Wynik</label>
                                <input type="text" name="score"
                                       value="{{ old('score') ?? $lastMatch->score ?? '' }}"
                                       class="form-control @error('score') is-invalid @enderror"
                                       id="score" placeholder="0-0" size="10" required>
                                @error('score')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Zapisz</button>
                    </form>
                </div>
            </div>
        </div>
    </x-admin-pages-template>
@endsection
