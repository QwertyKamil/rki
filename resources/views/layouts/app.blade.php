<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Logowanie - RKI</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('Semantic_UI/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Semantic_UI/semantic-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
@yield('content')
<script src="{{ asset('Semantic_UI/jquery-3.1.1.min.js') }} "
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="{{ asset('Semantic_UI/semantic.min.js') }}"></script>
</body>
</html>
