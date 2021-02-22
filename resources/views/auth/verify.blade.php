@extends('layout.app')

@section('content')
<div class="container">
    <div class="row pt-5 pb-5 justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-dark font-white">Zweryfikuj swój adres e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Na podany w rejestracji adres e-mail został wysłany link weryfikacyjny
                        </div>
                    @endif

                    Zanim przejdziesz dalej, sprawdź swoją skrzynkę odbiorczą e-mail, aby sprawdzić czy otrzymałeś link weryfikacyjny.
                    Jeśli nie otrzymałeś e-maila z linkiem weryfikacyjnym,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Kliknij tutaj, aby wygenerować kolejny link weryfikacyjny</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
