<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Remix Niebieszczany</title>
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
            @case('contact')
                @yield('content')
                @break
            @case('about-us')
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
            @case('admin.standings')
                @yield('content')
                @break
            @case('admin.matches.last.edit')
                @yield('content')
                @break
            @case('admin.matches.upcoming')
                @yield('content')
                @break
            @case('admin.player.list')
                @yield('content')
                @break
            @case('admin.player.details')
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
