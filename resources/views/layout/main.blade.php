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
        @include('shared/header')
    </header>
    <div class="wrapper">
        <div>
            @yield('home')
        </div>
    </div>
    <footer id="footer">
        @include('shared/footer')
    </footer>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
