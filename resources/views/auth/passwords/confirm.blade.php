@extends('layout.app')

@section('content')
<div class="container">
    <div class="row pt-5 pb-5 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark font-white">Potwierdź swoje hasło</div>

                <div class="card-body">
                    Proszę, potwierdź swoje hasło zanim przejdziesz dalej.

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Hasło</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-success">
                                    Potwierdź hasło
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Zapomniałeś swojego hasła?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
