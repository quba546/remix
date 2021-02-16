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
                        <h2 class="text-uppercase font-weight-bold mt-3">Ostatni mecz</h2>
                        <div class="border border-success rounded m-4">
                            <h5 class="mt-2 font-weight-bold">Edytuj dane</h5>
                            <hr>
                            <form method="POST">
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-6">
                                        <label for="home">Gospodarz</label>
                                        <input type="text" class="form-control" id="home" placeholder="REMIX Niebieszczany" size="50" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="guest">Gość</label>
                                        <input type="text" class="form-control" id="guest" placeholder="Manchester United" size="50" required>
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-12">
                                        <label for="game-type">Rodzaj meczu</label>
                                        <select class="custom-select" id="game-type" name="gameType" required>
                                            <option selected value="league">ligowy</option>
                                            <option value="friendly">sparing</option>
                                            <option value="cup">pucharowy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row ml-2 mr-2">
                                    <div class="form-group col-md-6">
                                        <div class="form-row">
                                            <div id="league-matches" class="form-group col-md-6">
                                                <label for="round">Kolejka</label>
                                                <input type="number" class="form-control" id="round" placeholder="1" min="1" max="38" required>
                                            </div>
                                            <div id="date-div-toggler" class="form-group col-md-6">
                                                <label for="date">Data</label>
                                                <input type="date" class="form-control" id="date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="score">Wynik</label>
                                        <input type="text" class="form-control" id="score" placeholder="1-0" size="5" required>
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
