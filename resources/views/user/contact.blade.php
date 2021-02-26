@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3">
                    <h2 class="text-uppercase font-weight-bold mt-3">Kontakt</h2>
                    <hr class="hr-text">
                    <div class="container">
                        <div class="row mx-auto mt-5">
                            <div class="col-12 col-lg-6 d-flex justify-content-center">
                                <img src="{{ url('/assets/herb_remix_niebieszczany.png') }}" alt="Herb Remix Niebieszczany" class="img-fluid p-5">
                            </div>
                            <div class="col-12 col-lg-6 border border-success text-center text-lg-left p-4">
                                <h3 class="font-weight-bold">Zarząd klubu</h3>
                                <br>
                                <p><b>Prezes</b><span class="text-uppercase"> - Bobik Szymon</span></p>
                                <p><b>Wiceprezes</b><span class="text-uppercase"> - Sokół Władysław</span></p>
                                <p><b>Skarbnik</b><span class="text-uppercase"> - Kosar Kamil</span></p>
                                <p><b>Sekretarz</b><span class="text-uppercase"> - Janiszewski Marcin</span></p>
                                <p><b>Członek zarządu</b><span class="text-uppercase"> - Niemczyk Daniel</span></p>
                                <hr>
                                <h3 class="font-weight-bold">Dane kontaktowe</h3>
                                <br>
                                <p><b class="mr-2">Tel.:</b><a href="tel:695780307"> 695-780-307</a></p>
                                <p><b class="mr-2">E-mail:</b><a href="mailto:remix.niebieszczany@op.pl"> remix.niebieszczany@op.pl</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
