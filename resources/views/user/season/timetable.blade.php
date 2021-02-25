@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3">
                    <h2 class="text-uppercase font-weight-bold mt-3">Terminarz</h2>
                    <hr>
                    <div class="mt-5">
                        <div>
                            <div class="container">
                                @for ($i = 0; $i < count($matches); $i++)
                                    @once <h3 class="text-center">A klasa grupa krośnieńska I - sezon 2020/2021</h3> @endonce
                                    <div class="border border-success shadow-lg mt-4 pb-4">
                                        <div class="row">
                                            <div class="col-12 text-left ml-5 mt-3 mb-4">
                                                <h4>Kolejka {{ $matches[$i][count($matches[$i]) - 2] }} - {{ $matches[$i][count($matches[$i]) - 1] }}</h4>
                                            </div>
                                        </div>
                                        @for ($j = 0; $j < count($matches[$i]) - 2; $j++)
                                            <div class="row mb-4 mb-xl-0">
                                                {{--host--}}
                                                <div class="col-5 col-xl-4 d-flex justify-content-center align-items-center text-right text-uppercase {{ $matches[$i][$j][0] === 'Remix Niebieszczany' ? 'font-weight-bold' : '' }}">{{ $matches[$i][$j][0] }}</div>
                                                {{--score--}}
                                                <div class="col-2 col-xl-1 d-flex justify-content-center align-items-center text-center">{{ $matches[$i][$j][1] }}</div>
                                                {{--guest--}}
                                                <div class="col-5 col-xl-4 d-flex justify-content-center align-items-center text-left text-uppercase {{ $matches[$i][$j][2] === 'Remix Niebieszczany' ? 'font-weight-bold' : '' }}">{{ $matches[$i][$j][2] }}</div>
                                                {{--date--}}
                                                <div class="col-12 col-xl-3 d-flex justify-content-center align-items-center text-center">{{ $matches[$i][$j][3] }}</div>
                                            </div>
                                        @endfor
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
