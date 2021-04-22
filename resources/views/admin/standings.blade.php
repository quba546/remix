@extends('layout.app')

@section('content')
    <x-admin-pages-template title="Tabela ligowa" cardHeader="Edytuj tabelę ligową">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.standing.store') }}" method="POST">
                        @csrf
                        <div class="form-group ml-2 mr-2">
                            <label for="standingUrl">Adres URL do tabeli</label>
                            <input type="url" name="url" value="{{ old('date') }}"
                                   class="form-control @error('url') is-invalid @enderror"
                                   id="standingUrl" aria-describedby="urlHelp"
                                   placeholder="https://example.com" size="200" required>
                            <small id="urlHelp" class="form-text text-muted">Wpisz powyżej poprawny
                                adres URL z tabelą, z
                                której chcesz pobrać dane.
                            </small>
                            @error('url')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-row ml-1 mr-1">
                            <div class="form-group col-12 col-lg-6">
                                <label for="numberOfPromotionTeams">Liczba drużyn, które awansują do wyższej ligi</label>
                                <input type="number" id="numberOfPromotionTeams" name="numberOfPromotionTeams" value="{{ old('numberOfPromotionTeams') ?? $numberOfPromotionTeams }}" class="form-control @error('numberOfPromotionTeams') is-invalid @enderror" min="1" step="1" max="10" required>
                                @error('numberOfPromotionTeams')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="numberOfRelegationTeams">Liczba drużyn, które spadną do niższej ligi</label>
                                <input type="number" id="numberOfRelegationTeams" name="numberOfRelegationTeams" value="{{ old('numberOfRelegationTeams') ?? $numberOfRelegationTeams }}" class="form-control @error('numberOfRelegationTeams') is-invalid @enderror" min="0" step="1" max="10" required>
                                @error('numberOfRelegationTeams')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success mb-3">Pobierz dane
                        </button>
                    </form>
                    <div class="form-row">
                        <div class="form-group col-12 d-flex justify-content-center justify-content-lg-end">
                        @can('admin-level')

                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger"
                                        data-toggle="modal"
                                        data-target="#staticBackdropDeletePlayer">Wyczyść tabelę
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdropDeletePlayer"
                                     data-backdrop="static" data-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">
                                                    Wyczyść tabelę ligową</h5>
                                                <button type="button" class="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Czy na pewno chcesz wyczyścić tabelę ligową?</p>
                                                <form action="{{ route('admin.standing.destroy') }}"
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
