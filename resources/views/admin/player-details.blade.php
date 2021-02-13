@extends('layout.main')

@section('content')
    <div class="row mr-lg-auto mx-auto">
        <div class="col-12 col-lg-3 col-xl-2 mt-3 mb-3">
            @include('shared.sidebar-admin')
        </div>
        <div class="col-12 col-lg-1 col-xl-2"></div>
        <div class="col-12 col-lg-7 col-xl-6 mt-3 mb-3 text-center bg-white p-2 shadow-lg">
            <h2 class="text-uppercase font-weight-bold">Szczegóły zawdodnika</h2>
            <div class="border border-success rounded mt-4 m-2">
                <h5 class="mt-2 font-weight-bold">Edytuj dane zawodnika</h5>
                <hr>
                <form method="POST">
                    <div class="form-row ml-2 mr-2">
                        <div class="form-group col-md-6">
                            <label for="firstName">Imię</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Jan" size="20" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Nazwisko</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Kowalski" size="30" required>
                        </div>
                    </div>
                    <div class="form-row ml-2 mr-2">
                        <div class="form-group col-md-6">
                            <label for="position">Pozycja</label>
                            <select class="custom-select" id="position" required>
                                <option value="bramkarz">bramkarz</option>
                                <option value="obrońca">obrońca</option>
                                <option value="pomocnik">pomocnik</option>
                                <option value="napastnik">napastnik</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="number">Numer</label>
                            <input type="number" class="form-control" id="number" placeholder="18" step="1" min="1" max="99">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row ml-2 mr-2">
                        <div class="form-group col-md-4">
                            <label for="playedMatches">Rozegrane mecze</label>
                            <input type="number" class="form-control" id="playedMatches" placeholder="0" step="1" min="0">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="goals">Bramki</label>
                            <input type="number" class="form-control" id="goals" placeholder="0" step="1" min="0">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="assists">Asysty</label>
                            <input type="number" class="form-control" id="assists" placeholder="0" step="1" min="0">
                        </div>
                    </div>
                    <div class="form-row ml-2 mr-2">
                        <div class="form-group col-md-4">
                            <label for="cleanSheets">Czyste konta</label>
                            <input type="number" class="form-control" id="cleanSheets" placeholder="0" step="1" min="0">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="yellowCards">Żółte kartki</label>
                            <input type="number" class="form-control" id="yellowCards" placeholder="0" step="1" min="0">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="redCards">Czerwone kartki</label>
                            <input type="number" class="form-control" id="redCards" placeholder="0" step="1" min="0">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mb-2">Edytuj</button>
                </form>
            </div>
            <div class="col-12 col-lg-1 col-xl-2"></div>
        </div>
@endsection
