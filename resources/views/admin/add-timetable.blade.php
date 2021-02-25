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
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-1 col-lg-2"></div>
                    <div class="col-10 col-lg-8 bg-white shadow-lg text-center">
                        <h2 class="text-uppercase font-weight-bold mt-3">Dodawanie kolejki do terminarza</h2>
                        <hr>
                        <div class="border border-success rounded m-4">
                            <h5 class="mt-2 font-weight-bold">Edytuj dane</h5>
                            <hr>
                            <form action="{{ route('admin.timetable.store') }}" method="POST">
                                @csrf
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-6">
                                        <label for="round">Kolejka</label>
                                        <input type="number" name="round" value="{{ old('round') }}" class="form-control @error('round') is-invalid @enderror" id="round" placeholder="Kolejka" min="1" step="1" max="50" required>
                                        @error('round')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="date">Data</label>
                                        <input type="text" name="date" value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror" id="date" placeholder="Data" max="50" required>
                                        @error('date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-12">
                                        <label for="matches">Mecze w danej kolejce</label>
                                        <textarea type="text" rows="10" name="matches" class="form-control @error('matches') is-invalid @enderror" id="matches" maxlength="1000" required>{{ old('matches') }}</textarea>
                                        <small id="matchesHelp" class="form-text text-muted">Wklej wszystkie mecze z kolejki podanej wyżej np. "Victoria Pakoszówka	1-3	Remix Niebieszczany	31 października, 14:00"</small>
                                        @error('matches')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-success mb-3">Zapisz kolejkę</button>
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
