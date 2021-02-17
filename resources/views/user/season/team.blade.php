@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3" >
                    <h2 class="text-uppercase font-weight-bold mt-3">Kadra</h2>
                    <table class="table table-sm table-striped table-bordered table-home-font">
                        <thead class="thead-dark">
                        <tr>
                            <th class="text-center align-middle">Lp.</th>
                            <th class="text-center align-middle">Nr</th>
                            <th class="text-center align-middle">
                                Nazwisko
                                @sortablelink('last_name' , '')
                            </th>
                            <th class="text-center align-middle">
                                Imię
                                @sortablelink('first_name' , '')
                            </th>
                            <th class="text-center align-middle">
                                Pozycja
                                @sortablelink('position' , '')
                            </th>
                        </tr>
                        </thead>
                        <tbody class="table-light">
                        @foreach($players ?? [] as $player)
                            <tr>
                                <td class="text-center align-middle">{{ ($players->currentpage()-1) * $players->perpage() + $loop->index + 1 }}</td>
                                <td class="text-center align-middle">{{ $player->nr }}</td>
                                <td class="text-center align-middle text-uppercase">{{ $player->last_name }}</td>
                                <td class="text-center align-middle">{{ $player->first_name }}</td>
                                <td class="text-center align-middle">{{ $player->position }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $players->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
