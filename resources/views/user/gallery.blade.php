@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3">
                    <h2 class="text-uppercase font-weight-bold mt-3">Galeria</h2>
                    <hr class="hr-text">
                    <div class="row mt-5 d-flex align-items-center">
                        @foreach ($photos as $photo)
                            <div class="col-12 col-xl-4 mb-4" data-aos="fade-up" data-aos-duration="1000">
                                <div class="imageGallery1">
                                    <a href="{{ asset('storage/photos/' . $photo->filename) }}"><img src="{{ asset('storage/photos/' . $photo->filename) }}" class="img-thumbnail" alt="Zdjęcie w galerii"/></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
