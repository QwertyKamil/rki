@extends('layouts.app')

@section('content')
    <div class="centred-container">
        <div class="ui raised very padded text container segment">
            <h1 class="ui header">Rejestracja</h1>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            @endif
            <form method="POST" class="ui form" action="{{ route('register') }}" aria-label="{{ __('Login') }}">
                @csrf
                <div class="field">
                    <label>E-mail</label>
                    <input type="text" name="name" placeholder="Login">
                </div>
                <div class="field">
                    <label>E-mail</label>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="field">
                    <label>Hasło</label>
                    <input type="password" name="password" placeholder="Hasło">
                </div>
                <div class="field">
                    <label>E-mail</label>
                    <input type="password" name="password_confirmation" placeholder="Powtórz hasło">
                </div>
                <button class="ui button" type="submit">Zarejestruj</button>
            </form>
            <div class="extra content">
                <a class="nav-link" href="{{ route('login') }}">Logowanie</a>
                <a class="nav-link" href="{{ route('register') }}">Rejestracja</a>
            </div>
        </div>
    </div>
@endsection
