<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Logowanie - Kominiarczyk</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('semanticUI/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ url('semanticUI/semantic-admin.css') }}">


</head>
<body>
<div>
    @yield('content')
</div>

<script src="{{ url('semanticUI/jquery-3.1.1.min.js') }} "
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="{{ url('semanticUI/semantic.min.js') }}"></script>
</body>
</html>
