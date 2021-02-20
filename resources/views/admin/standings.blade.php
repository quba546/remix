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
                        <h2 class="text-uppercase font-weight-bold mt-3">Tabela ligowa</h2>
                        <div class="border border-success rounded m-4">
                            <h5 class="mt-2 font-weight-bold">Dane do tabeli</h5>
                            <hr>
                            <form action="{{ route('admin.standing.store') }}" method="POST">
                                @csrf
                                <div class="form-group ml-2 mr-2">
                                    <label for="standingUrl">Adres URL do tabeli</label>
                                    <input type="url" name="url" value="" class="form-control" id="standingUrl" aria-describedby="urlHelp"
                                           placeholder="https://example.com" size="200" required>
                                    <small id="urlHelp" class="form-text text-muted">Wpisz powyżej poprawny adres URL z tabelą, z
                                        której chcesz pobrać dane.</small>
                                </div>
                                <button type="submit" class="btn btn-outline-success mb-3">Pobierz dane</button>
                            </form>
                            <div class="form-row ml-2 mr-2">
                                <div class="form-group col-12 d-flex justify-content-end">
                                    <form action="{{ route('admin.standing.destroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Czy na pewno chcesz wyczyścić tabelę?')" class="btn btn-outline-danger">Wyczyść</button>
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
