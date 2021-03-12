<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {!! SEOMeta::generate() !!}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Remix Niebieszczany') }} | Oficjalna strona klubu</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <!-- Fonts -->
    <style>@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap')</style>
</head>
<body>
    <header>
        @include('shared.header')
    </header>
    <div class="wrapper">
        <main>
            @yield('content')
        </main>
    </div>
    <footer class="footer mt-auto">
        @include('shared.footer')
    </footer>
    <a id="back-to-top" href="#" class="back-to-top" role="button">
        <i class="fas fa-chevron-up font-16"></i>
    </a>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
    @include('cookieConsent::index')
</body>
</html>
