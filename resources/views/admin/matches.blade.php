@extends('layout.main')

@section('matches')
    <div class="row mr-lg-auto mx-auto bg-white">
        <div class="col-12 col-lg-3 col-xl-2 mt-3 mb-3">
            @include('shared.admin-sidebar')
        </div>
        <div class="col-12 col-lg-1 col-xl-2"></div>
        <div class="col-12 col-lg-7 col-xl-6 mt-3 mb-3 text-center border border-success rounded p-2 shadow-lg">
            <h2 class="text-uppercase font-weight-bold">Ostatni i najbliższy mecz</h2>
                <div class="border border-success rounded mt-3 m-2">
                    <h5 class="mt-2 font-weight-bold">Ostatni mecz</h5>
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
                            <div class="form-group col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="round">Kolejka</label>
                                        <input type="number" class="form-control" id="round" placeholder="1" min="1" max="38" required>
                                    </div>
                                    <div class="form-group col-md-6">
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
                        <button type="submit" class="btn btn-success mb-2">Zapisz</button>
                    </form>
                </div>
            <div class="border border-success rounded m-2">
                <h5 class="mt-2 font-weight-bold">Najbliższy mecz</h5>
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
                        <div class="form-group col-md-6">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="round">Kolejka</label>
                                    <input type="number" class="form-control" id="round" placeholder="1" min="1" max="38" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date">Data</label>
                                    <input type="date" class="form-control" id="date" min="{{\Carbon\Carbon::now()->toDateString()}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="place">Lokalizacja</label>
                            <input type="text" class="form-control" id="place" placeholder="Niebieszczany" size="30" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mb-2">Zapisz</button>
                </form>
            </div>
        <div class="col-12 col-lg-1 col-xl-2"></div>
    </div>
@endsection
