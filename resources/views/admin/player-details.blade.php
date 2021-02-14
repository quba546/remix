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
                                <button type="submit" class="btn btn-success mb-3">Edytuj</button>
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
