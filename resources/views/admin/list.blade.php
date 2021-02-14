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
                    <div class="col-8 bg-white shadow-lg text-center">
                        <h2 class="text-uppercase font-weight-bold mt-3">Lista zawodników</h2>
                        <table class="table table-sm table-responsive-lg table-striped table-hover table-bordered mt-4 table-home-font">
                            <thead class="thead-dark">
                            <tr>
                                <th class="text-center align-middle">Nr</th>
                                <th class="text-center align-middle">Imię</th>
                                <th class="text-center align-middle">Nazwisko</th>
                                <th class="text-center align-middle">Pozycja</th>
                                <th class="text-center align-middle">Opcje</th>
                            </tr>
                            </thead>
                            <tbody class="table-light">
                            <tr>
                                <td class="text-center align-middle">8</td>
                                <td class="text-center align-middle">Jan</td>
                                <td class="text-center align-middle">Kowalski</td>
                                <td class="text-center align-middle">obrońca</td>
                                <td class="text-center align-middle">Szczegóły</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="border border-success rounded m-4">
                            <h5 class="mt-2 font-weight-bold">Dodaj zawodnika</h5>
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
                                <button type="submit" class="btn btn-success mb-3">Dodaj</button>
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
