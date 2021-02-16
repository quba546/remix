@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="p-3">
                    <h2>Kadra</h2>
                    <table class="table table-sm table-striped table-bordered table-home-font">
                        <thead class="thead-dark">
                        <tr>
                            <th class="text-center align-middle">Nr</th>
                            <th class="text-center align-middle">Nazwisko</th>
                            <th class="text-center align-middle">Imię</th>
                            <th class="text-center align-middle">Pozycja</th>
                        </tr>
                        </thead>
                        <tbody class="table-light">
                        @foreach($players ?? [] as $player)
                            <tr>
                                <td class="text-center align-middle">{{ $player->nr }}</td>
                                <td class="text-center align-middle text-uppercase">{{ $player->last_name }}</td>
                                <td class="text-center align-middle">{{ $player->first_name }}</td>
                                <td class="text-center align-middle">{{ $player->position }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
