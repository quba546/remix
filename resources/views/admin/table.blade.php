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
                        <h2 class="text-uppercase font-weight-bold mt-3">Tabela ligowa</h2>
                        <div class="border border-success rounded m-4">
                            <h5 class="mt-2 font-weight-bold">Dane do tabeli</h5>
                            <hr>
                            <form method="POST">
                                <div class="form-group ml-2 mr-2">
                                    <label for="tableUrl">Adres URL do tabeli</label>
                                    <input type="url" class="form-control" id="tableUrl" aria-describedby="urlHelp"
                                           placeholder="https://example.com" pattern="https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)
" size="200" required>
                                    <small id="urlHelp" class="form-text text-muted">Wpisz powyżej poprawny adres URL z tabelą, z
                                        której chcesz pobrać dane.</small>
                                </div>
                                <button type="submit" class="btn btn-success mb-3">Pobierz dane</button>
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
