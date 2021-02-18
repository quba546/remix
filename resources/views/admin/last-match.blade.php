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
                        <h2 class="text-uppercase font-weight-bold mt-3">Ostatni mecz</h2>
                        <div class="border border-success rounded m-4">
                            <h5 class="mt-2 font-weight-bold">Edytuj dane</h5>
                            <hr>
                            <form action="{{ route('admin.matches.last.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-6">
                                        <label for="host">Gospodarz</label>
                                        <input type="text" name="host" value="{{ $lastMatch->host ?? '' }}" class="form-control" id="host" placeholder="Gospodarze" size="50" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="guest">Gość</label>
                                        <input type="text" name="guest" value="{{ $lastMatch->guest ?? '' }}" class="form-control" id="guest" placeholder="Goście" size="50" required>
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-12">
                                        <label for="match-type">Rodzaj meczu</label>
                                        <select class="custom-select" name="matchType" id="match-type" required>
                                            @foreach($matchTypes ?? [] as $matchType)
                                                <option value="{{ $matchType->id }}">{{ $matchType->id === 2 ? $matchType->type : $matchType->type . ' - ' . $matchType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-6">
                                        <div class="form-row">
                                            <div id="league-matches" class="form-group col-md-6">
                                                <label for="round">Kolejka</label>
                                                <input type="number" name="round" value="{{ $lastMatch->round ?? '' }}" class="form-control" id="round" placeholder="1" min="1" max="38">
                                            </div>
                                            <div id="date-div-toggler" class="form-group col-md-6">
                                                <label for="date">Data</label>
                                                <input type="date" name="date" value="{{ $lastMatch->date ?? '' }}" class="form-control" id="date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="score">Wynik</label>
                                        <input type="text" name="score" value="{{ $lastMatch->score ?? '' }}" class="form-control" id="score" placeholder="0-0" size="5" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-success mb-3">Zapisz</button>
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
