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
            @case('home')
                @yield('home')
                @break
            @case('contact')
                @yield('contact')
                @break
            @case('about-us')
                @yield('about-us')
                @break
            @case('season.table')
                @yield('table')
                @break
            @case('season.team')
                @break
                @yield('team')
                @break
            @case('season.stats')
                @yield('stats')
                @break
            @case('season.timetable')
                @yield('timetable')
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
                @yield('dashboard')
                @break
            @case('admin.table')
                @yield('table')
                @break
            @case('admin.matches')
                @yield('matches')
                @break
            @case('admin.list')
                @yield('list')
                @break
        @endswitch
    </div>
</div>
<footer id="footer">
    @include('shared.footer')
</footer>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
