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
                        <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                data-target="#staticBackdropAdd">
                            Dodaj nowe zdjęcie
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdropAdd" data-backdrop="static" data-keyboard="false"
                             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Dodaj zdjęcie</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.photos.store') }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="custom-file">
                                                <input type="file" name="image"
                                                       class="custom-file-input @error('image') is-invalid @enderror"
                                                       id="image" accept="image/*">
                                                <label class="custom-file-label text-left" for="image"
                                                       data-browse="Przeglądaj">Wybierz zdjęcie...</label>
                                                @error('image')
                                                <div class="alert alert-danger d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="description">Opis (opcjonalny)</label>
                                                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                        data-dismiss="modal">Zamknij
                                                </button>
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
                                <div class="row">

                                    {{--                                one card with photo--}}
                                    @foreach ($photos as $photo)
                                        <div
                                            class="col-6 col-xl-3 mb-3 d-flex align-items-stretch justify-content-center">
                                            <div class="card" style="width: 14rem;">
                                                <div class="imageGallery1">
                                                    <a href="{{ asset('storage/' . $photo->path) }}"><img
                                                            src="{{ asset('storage/' . $photo->path) }}"
                                                            class="card-img-top" alt="Zdjęcie"/></a>
                                                </div>
                                                <div class="card-body d-flex align-items-end justify-content-center">
                                                    <div>
                                                        <span class="d-flex justify-content-center">Utworzono:</span>
                                                        <span
                                                            class="d-flex justify-content-center mb-2">{{ $photo->created_at }}</span>

                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal" data-target="#staticBackdropDelete">
                                                            Usuń
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="staticBackdropDelete"
                                                             data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="staticBackdropLabel">Potwierdzenie
                                                                            usunięcia zdjęcia</h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Czy na pewno chcesz usunąć to zdjęcie?</p>
                                                                        <form
                                                                            action="{{ route('admin.photos.destroy', ['photo' => $photo->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                        class="btn btn-outline-secondary"
                                                                                        data-dismiss="modal">Zamknij
                                                                                </button>
                                                                                <button type="submit"
                                                                                        class="btn btn-outline-danger">
                                                                                    Usuń
                                                                                </button>
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
                                    @endforeach
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
                    <div class="col-1 col-lg-2"></div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection
