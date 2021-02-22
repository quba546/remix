<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Remix Niebieszczany') }}</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap');
    </style>
</head>
<body>
<header>
    @include('shared.header')
</header>
<div class="wrapper">
    <div>
        @switch(\Illuminate\Support\Facades\Route::current()->getName())
            @case('index')
                @yield('content')
                @break
            @case('page')
                @yield('content')
                @break
            @case('season.standings.index')
                @yield('content')
                @break
            @case('season.team.index')
                @yield('content')
                @break
            @case('season.stats.index')
                @yield('content')
                @break
            @case('season.timetable')
                @yield('content')
                @break
            @case('login')
                @yield('content')
                @break
            @case('register')
                @yield('content')
                @break
            @case('password.request')
                @yield('content')
                @break
            @case('password.confirm')
                @yield('content')
                @break
            @case('admin.dashboard')
                @yield('content')
                @break
            @case('admin.standing.create')
                @yield('content')
                @break
            @case('admin.matches.last.edit')
                @yield('content')
                @break
            @case('admin.matches.upcoming.edit')
                @yield('content')
                @break
            @case('admin.players.index')
                @yield('content')
                @break
            @case('admin.players.edit')
                @yield('content')
                @break
        @endswitch
    </div>
</div>
<footer id="footer">
    @include('shared.footer')
</footer>
<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
