<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel - Kominiarczyk</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('semanticUI/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('semanticUI/semantic-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">

</head>
<body>
<header>
    <div class="logo-container">
        <img src="{{asset('img/logo.png')}}">
    </div>
    <div class="logged-info">
        <p>Witaj, {{Auth::user()->name}}</p>
        <p>|</p>
        <a class="" href="{{ route('logout-admin') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            Wyloguj
        </a>
        <form id="logout-form" action="{{ route('logout-admin') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</header>
@include('admin.layout.navbar')
<div class="main-content">
    @include('admin.layout.messages')
    @yield('content')
</div>

<script src="{{ asset('semanticUI/jquery-3.1.1.min.js') }} "
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="{{ asset('semanticUI/semantic.min.js') }}"></script>
<script>
    $('.message .close')
        .on('click', function () {
            $(this)
                .closest('.message')
                .transition('fade');
        });
</script>

@yield('scripts')
</body>
</html>
