@extends('layouts.app')

@section('content')
    <div class="centred-container">
        <div class="ui raised very padded text container segment">
            <h1 class="ui header">Logowanie</h1>
            <form method="POST" class="ui form" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
                <div class="field">
                    <label>E-mail</label>
                    <input type="email" name="email" placeholder="Email/Login">
                </div>
                <div class="field">
                    <label>Hasło</label>
                    <input type="password" name="password" placeholder="Hasło">
                </div>
                <button class="ui button" type="submit">Zaloguj</button>
            </form>
            <div class="extra content">
                <a class="nav-link" href="{{ route('login') }}">Logowanie</a>
                <a class="nav-link" href="{{ route('register') }}">Rejestracja</a>
            </div>
        </div>
    </div>
@endsection
