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
                            <div class="row mx-aut">
                                <div class="col-12">
                                    <h3 class="text-center font-weight-bold">A klasa grupa krośnieńska I - sezon
                                        2020/2021</h3>
                                </div>
                                <div class="col-12 mt-4 mb-3">
                                    <h4>Wybierz kolejkę:</h4>
                                    @foreach ($rounds as $round)
                                        <a href="#round-{{ $round['round'] }}"
                                           class="btn btn-outline-success mb-3 @if ($loop->iteration < $rounds->count()) mr-2 @endif">{{ $round['round'] }}</a>
                                        @if ($loop->iteration > 15) @once <br> @endonce @endif
                                    @endforeach
                                </div>
                            </div>
                            @foreach ($rounds as $round)
                                <div class="border border-success shadow-lg mt-4 pb-4">
                                    <div class="row ">
                                        <div class="col-12 text-center text-xl-left ml-0 ml-xl-5 mt-3 mb-4">
                                            <span class="anchor" id="round-{{ $round['round'] }}"></span>
                                            <h4><i class="far fa-calendar-check"></i> Kolejka {{ $round['round'] }}
                                                | {{ $round['date'] }}
                                            </h4>
                                        </div>
                                    </div>
                                    @foreach ($round['matches'] as $key => $match)
                                        @if (count($match) >= 4)
                                            <div class="row mx-auto">
                                                @if ($match[0] === 'Remix Niebieszczany' || $match[2] === 'Remix Niebieszczany')
                                                    @php $bold = 'font-weight-bold'; @endphp
                                                @else
                                                    @php $bold = ''; @endphp
                                                @endif
                                                {{--host--}}
                                                <div
                                                    class="col-5 col-xl-4 text-right text-uppercase {{ $bold }}">{{ $match[0] ?? '' }}</div>
                                                {{--score--}}
                                                <div
                                                    class="col-2 col-xl-1 text-center {{ $bold }}">{{ $match[1] ?? '' }}</div>
                                                {{--guest--}}
                                                <div
                                                    class="col-5 col-xl-4 text-left text-uppercase {{ $bold }}">{{ $match[2] ?? '' }}</div>
                                                {{--date--}}
                                                <div
                                                    class="col-12 col-xl-3 d-flex justify-content-center align-items-center text-center {{ $bold }}">{{ $match[3] ?? '' }}</div>
                                            </div>
                                        @endif
                                        @if (count($match) >= 4 && !$loop->last)
                                            <hr class="hr-text d-flex d-xl-none">
                                        @endif
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
