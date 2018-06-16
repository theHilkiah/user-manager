<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', $title ?? config('app.name'))</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap/dist/css/bootstrap.min.css">
        @yield('styles')
        @stack('styles')
    </head>
    <body>
        @yield('layout')
        <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://unpkg.com/bootstrap/dist/js/bootstrap.min.js"></script>
        @yield('scripts')
        @stack('scripts')
    </body>
</html>
