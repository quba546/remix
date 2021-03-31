@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3">
                    <h2 class="text-uppercase font-weight-bold mt-3">Galeria</h2>
                    <hr class="hr-text">
                    <div class="row mt-5 d-flex align-items-center">
                        @if ($photos->count() !== 0)
                            @foreach ($photos as $photo)
                                <div class="col-12 col-xl-4 mb-4" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="imageGallery1">
                                        <a href="{{ asset('storage/photos/' . $photo->filename) }}"><img
                                                src="{{ asset('storage/photos/' . $photo->filename) }}"
                                                class="img-thumbnail" alt="Zdjęcie w galerii"/></a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 mb-5">
                                <span class="font-16">Brak zdjęć do wyświetlenia.</span>
                            </div>
                        @endif
                    </div>
                    @if ($photos->total() !== 0)
                        <div class="row">
                            @if ($photos->total() >= $photos->perPage())
                                <div class="col-12 col-lg-2 text-center pt-3">
                                    {{ $photos->appends(request()->query())->links() }}
                                </div>
                            @endif
                            <div class="col-12 col-lg-10 text-left d-flex align-items-center">
                                <span>Wyświetlono {{ ($photos->currentPage() - 1) * $photos->perPage() + 1 }} - @if ($photos->currentPage() === $photos->lastPage()) {{ $photos->total() }} @else {{ $photos->currentPage() * $photos->perPage() }} @endif z {{ $photos->total() }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
