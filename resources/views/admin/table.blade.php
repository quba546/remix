@extends('layout.main')

@section('table')
    <div class="row mr-lg-auto mx-auto bg-white">
        <div class="col-12 col-lg-3 col-xl-2 mt-3 mb-3">
            @include('shared.admin-sidebar')
        </div>
        <div class="col-12 col-lg-1 col-xl-2"></div>
        <div class="col-12 col-lg-7 col-xl-6 mt-3 mb-3 text-center border border-success rounded p-2 shadow-lg">
            <h2 class="text-uppercase font-weight-bold">Tabela ligowa</h2>
            <div class="border border-success rounded mt-3 m-2">
                <h5 class="mt-2 font-weight-bold">Dane do tabeli</h5>
                <hr>
                <form>
                    <div class="form-group ml-2 mr-2">
                        <label for="tableUrl">Adres URL do tabeli</label>
                        <input type="url" class="form-control" id="tableUrl" aria-describedby="urlHelp"
                               placeholder="https://example.com" pattern="https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)
" size="200" required>
                        <small id="urlHelp" class="form-text text-muted">Wpisz powyżej poprawny adres URL z tabelą, z
                            której chcesz pobrać dane.</small>
                    </div>
                    <button type="submit" class="btn btn-success mb-2">Pobierz dane</button>
                </form>
            </div>
            <div class="col-12 col-lg-1 col-xl-2"></div>
        </div>
@endsection
