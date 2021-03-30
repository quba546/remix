@extends('layout.app')

@section('content')
    <div class="d-flex" id="wrapper">
    @include('shared.sidebar-admin')
    <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <i class="fas fa-bars toggle-admin-icon" id="menu-toggle"></i>
            </nav>
            @include('shared.messages')
            <div class="container-fluid mb-5">
                <div class="row mt-5">
                    <div class="col-1 col-lg-2"></div>
                    <div class="col-10 col-lg-8 bg-white shadow-lg text-center">
                        <h2 class="text-uppercase font-weight-bold mt-3">Galeria</h2>
                        <hr>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#staticBackdropAdd">
                            Dodaj nowe zdjęcie
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdropAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Dodaj zdjęcie</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.photos.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

{{--                                        uploading new photo to gallery--}}
                                            <div class="custom-file-upload">
                                                <input type="file" name="uploadedPhoto" id="uploadPhoto"/>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Zamknij</button>
                                                <button type="submit" class="btn btn-outline-success">Dodaj</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-success m-4">
                            <h5 class="card-header">Lista zdjęć</h5>
                            <div class="card-body">
                                <div class="row ">

{{--                                one card with photo--}}
                                    @foreach ($photos as $photo)
                                        <div class="col-6 col-xl-3 mb-3 d-flex align-items-stretch justify-content-center">
                                            <div class="card" style="width: 14rem;">
                                                <img src="{{ asset('storage/photos/' . $photo->filename) }}" class="card-img-top" alt="Fotografia">
                                                <div class="card-body">
                                                    <span>Utworzono:</span>
                                                    <br>
                                                    <span class="d-block mb-2">{{ $photo->created_at }}</span>

                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#staticBackdropDelete">Usuń</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdropDelete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Potwierdzenie usunięcia zdjęcia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Czy na pewno chcesz usunąć to zdjęcie?</p>
                                                    <form action="{{ route('admin.photos.destroy', ['photo' => $photo->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Zamknij</button>
                                                            <button type="submit" class="btn btn-outline-danger">Usuń</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 col-lg-2"></div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection
