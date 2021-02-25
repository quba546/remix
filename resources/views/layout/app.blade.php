<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="Oficjalna strona klubu piłkarskiego LKS Remix Niebieszczany występującego w podokręgu krośnieńskim">
    <meta name="author" content="Jakub Pałys">
    <meta name="keywords" content="piłka nożna, remix, niebieszczany, lks,  lks remix niebieszczany, ozpn krosno">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Remix Niebieszczany') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <!-- Fonts -->
    <style>@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap');</style>
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
    <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
    @include('cookieConsent::index')
</body>
</html>
