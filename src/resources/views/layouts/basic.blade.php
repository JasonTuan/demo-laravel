<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo Laravel - @yield('title')</title>
    @vite('resources/sass/app.scss')
    @yield('styles')
</head>
<body>
    @yield('content')
    @vite('resources/js/app.js')
    @yield('scripts')
</body>
</html>
