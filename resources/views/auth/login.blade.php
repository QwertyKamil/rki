@extends('layouts.app')

@section('content')
    <div class="login-container ui grid">
        <div class="ui card eight wide column">
            <div class="content">
                <div class="header">Logowanie</div>
            </div>
            <div class="content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="ui input field">
                        <input id="email" type="text"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" value="{{ old('email') }}" required autofocus placeholder="Email/Login">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="ui input field">
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               name="password" required placeholder="Hasło">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <button class="ui button">Zaloguj</button>
                </form>
            </div>
            <div class="extra content">
                <a class="nav-link" href="{{ route('login') }}">Logowanie</a>
                <a class="nav-link" href="{{ route('register') }}">Rejestracja</a>
            </div>
        </div>
    </div>
@endsection
