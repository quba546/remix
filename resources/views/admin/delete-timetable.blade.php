@extends('layout.app')

@section('content')
    <x-admin-pages-template title="Usuwanie kolejki z terminarza" cardHeader="Usuń kolejkę">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.timetable.destroy.one',) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="form-row ml-2 mr-2">
                            <div class="col-12 mb-3">
                                <label for="round">Wybierz kolejkę do usunięcia</label>
                                <select class="form-control" name="round" id="round" required>
                                    <option selected disabled value="">Wybierz...</option>
                                    @foreach($rounds as $row)
                                        <option
                                            value="{{ $row->round }}">{{ 'Kolejka ' . $row->round . ' - ' . $row->date }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row mt-3 ml-2 mr-2">
                            <div class="col-12 mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-danger">Usuń kolejkę
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-row mt-2 mt-lg-0">
                        <div class="col-12 d-flex justify-content-center justify-content-xl-end">
                        @can('admin-level')

                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger"
                                        data-toggle="modal"
                                        data-target="#staticBackdropDeletePlayer">Wyczyść terminarz
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdropDeletePlayer"
                                     data-backdrop="static" data-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">
                                                    Wyczyść terminarz</h5>
                                                <button type="button" class="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Czy na pewno chcesz wyczyścić terminarz?</p>
                                                <form
                                                    action="{{ route('admin.timetable.destroy') }}"
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
                                                            Wyczyść
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-pages-template>
@endsection
