@extends('layout.app')

@section('content')
    @include('shared.messages')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3">
                    <h2 class="text-uppercase font-weight-bold mt-3">Profil gracza</h2>
                    <hr class="hr-text">
                    <div class="text-justify mt-5">
                        <div class="row">
                            <div class="col-12 col-lg-6 text-center">
                                <div class="circular--portrait">
                                    <img src="{{ isset($player->image)? asset('storage/' . $player->image) : asset('/storage/blank-profile-picture.png') }}" class="img-scorer" alt="Zdjęcie gracza">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mt-4 mt-lg-0 border border-success rounded p-4">
                                <table>
                                    <tr>
                                        <td class="font-16">Nazwisko:</td>
                                        <td class="font-20"><strong class="text-uppercase">{{ $player->last_name ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="font-16">Imię:</td>
                                        <td class="font-16"><strong>{{ $player->first_name ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="font-16">Nr:</td>
                                        <td class="font-16"><strong>{{ $player->nr ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="font-16">Pozycja:</td>
                                        <td class="font-16"><strong>{{ $player->position ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="font-16">Bramki:</td>
                                        <td class="font-16"><strong>{{ $player->goals ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="font-16">Asysty:</td>
                                        <td class="font-16"><strong>{{ $player->assists ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="font-16">Czyste konta:</td>
                                        <td class="font-16"><strong>{{ $player->clean_sheets ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="font-16">Żółte kartki:</td>
                                        <td class="font-16"><strong>{{ $player->yellow_cards ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4 font-16">Czerwone kartki:</td>
                                        <td class="font-16"><strong>{{ $player->red_cards ?? '' }}</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row mx-auto mt-3">
                            <div class="col-12 text-right">
                                <a href="{{ route('season.players.index') }}" class="btn btn-outline-info">Powrót do listy zawodników</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
