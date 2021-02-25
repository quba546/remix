@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3">
                    <h2 class="text-uppercase font-weight-bold mt-3">Profil gracza</h2>
                    <hr>
                    <div class="text-justify mt-5">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="player-img t">
                                    <img src="{{ $player->image ? asset('storage/' . $player->image) : asset('/storage/blank-profile-picture.png') }}" alt="Zdjęcie gracza">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 border border-success rounded">
                                <table>
                                    <tr>
                                        <td>Nazwisko:</td>
                                        <td><strong class="text-uppercase">{{ $player->last_name ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Imię:</td>
                                        <td><strong>{{ $player->first_name ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nr:</td>
                                        <td><strong>{{ $player->nr ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Pozycja:</td>
                                        <td><strong>{{ $player->position ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Bramki:</td>
                                        <td><strong>{{ $player->goals ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Asysty:</td>
                                        <td><strong>{{ $player->assists ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Czyste konta:</td>
                                        <td><strong>{{ $player->clean_sheets ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Żółte kartki:</td>
                                        <td><strong>{{ $player->yellow_cards ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4">Czerwone kartki:</td>
                                        <td><strong>{{ $player->red_cards ?? '' }}</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection