@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center pb-3">
                    <h2 class="text-uppercase font-weight-bold mt-3">Terminarz</h2>
                    <hr class="hr-text">
                    <div class="mt-5">
                        @if ($rounds->count() !== 0)
                        @foreach ($rounds as $round)
                            @once <h3 class="text-center">A klasa grupa krośnieńska I - sezon 2020/2021</h3> @endonce
                            <div class="border border-success shadow-lg mt-4 pb-4">
                                <div class="row mx-auto">
                                    <div class="col-12 text-center text-xl-left ml-0 ml-xl-5 mt-3 mb-4">
                                        <h4><i class="far fa-calendar-check"></i> Kolejka {{ $round['round'] }} - {{ $round['date'] }}</h4>
                                    </div>
                                </div>
                                @foreach ($round['matches'] as $key => $match)
                                    <div class="row mb-4 mb-xl-0">
                                        @if (count($match) >= 4)
                                            @if ($match[0] === 'Remix Niebieszczany' || $match[2] === 'Remix Niebieszczany')
                                                {{--host--}}
                                                <div class="col-5 col-xl-4 text-right text-uppercase font-weight-bold">{{ $match[0] ?? '' }}</div>
                                                {{--score--}}
                                                <div class="col-2 col-xl-1 text-center font-weight-bold">{{ $match[1] ?? '' }}</div>
                                                {{--guest--}}
                                                <div class="col-5 col-xl-4 text-left text-uppercase font-weight-bold">{{ $match[2] ?? '' }}</div>
                                                {{--date--}}
                                                <div class="col-12 col-xl-3 d-flex justify-content-center align-items-center text-center font-weight-bold">{{ $match[3] ?? '' }}</div>
                                            @else
                                                {{--host--}}
                                                <div class="col-5 col-xl-4 text-right text-uppercase">{{ $match[0] ?? '' }}</div>
                                                {{--score--}}
                                                <div class="col-2 col-xl-1 text-center">{{ $match[1] ?? '' }}</div>
                                                {{--guest--}}
                                                <div class="col-5 col-xl-4 text-left text-uppercase">{{ $match[2] ?? '' }}</div>
                                                {{--date--}}
                                                <div class="col-12 col-xl-3 d-flex justify-content-center align-items-center text-center">{{ $match[3] ?? '' }}</div>
                                            @endif
                                        @endif
                                    </div>
                                    @if (count($match) >= 4 && !$loop->last) <hr class="hr-text d-flex d-xl-none"> @endif
                                @endforeach
                            </div>
                        @endforeach
                        @else
                            <div class="col-12 mb-5">
                                <span class="font-16">Brak terminarza do wyświetlenia.</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
