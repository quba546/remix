@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3">
                    <h2 class="text-uppercase font-weight-bold mt-3">Kontakt</h2>
                    <div class="container">
                        <div class="row mx-auto mt-5">
                            <div class="col-12 col-lg-6 d-flex justify-content-center">
                                <img src="{{ url('/assets/herb_remix_niebieszczany.png') }}" alt="Herb Remix Niebieszczany" class="img-fluid p-5">
                            </div>
                            <div class="col-12 col-lg-6 border border-success text-center text-lg-left p-4">
                                <h3>Zarząd klubu</h3>
                                <br>
                                <p><b>Prezes</b> - Bobik Szymon</p>
                                <p><b>Wiceprezes</b> - Sokół Władysław</p>
                                <p><b>Skarbnik</b> - Kosar Kamil</p>
                                <p><b>Sekretarz</b> - Janiszewski Marcin</p>
                                <p><b>Członek zarządu</b> - Niemczyk Daniel</p>
                                <hr>
                                <h3>Dane kontaktowe</h3>
                                <br>
                                <p><b>Tel.:</b><a href="tel:695780307"> 695-780-307</a></p>
                                <p><b>E-mail:</b><a href="mailto:remix.niebieszczany@op.pl"> remix.niebieszczany@op.pl</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">--}}
{{--                <div class="text-center p-3">--}}
{{--                    <h2 class="text-uppercase font-weight-bold mt-3">Kontakt</h2>--}}
{{--                    <div class="text-justify mt-5">--}}
{{--                        <img src="{{ url('/assets/herb_remix_niebieszczany.png') }}" alt="Herb Remix Niebieszczany" class="float-left mr-3 mb-3" width="30%">--}}
{{--                        <div class="pt-3 pl-5 border border-success t">--}}
{{--                            <h3>Zarząd klubu</h3>--}}
{{--                            <p><b>Prezes</b> - Bobik Szymon</p>--}}
{{--                            <p><b>Wiceprezes</b> - Sokół Władysław</p>--}}
{{--                            <p><b>Skarbnik</b> - Kosar Kamil</p>--}}
{{--                            <p><b>Sekretarz</b> - Janiszewski Marcin</p>--}}
{{--                            <p><b>Członek zarządu</b> - Niemczyk Daniel</p>--}}
{{--                            <h3>Dane kontaktowe</h3>--}}
{{--                            <p><b>Tel.:</b><a href="tel:695780307"> 695-780-307</a></p>--}}
{{--                            <p><b>E-mail:</b><a href="mailto:remix.niebieszczany@op.pl"> remix.niebieszczany@op.pl</a></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
