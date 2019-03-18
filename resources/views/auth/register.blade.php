@extends('layouts.app')

@section('content')
    <div class="login-container ui grid">
        <div class="ui card eight wide column">
            <div class="content">
                <div class="header">Logowanie</div>
            </div>
            <div class="content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="ui input field">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               name="name" value="{{ old('name') }}" required autofocus placeholder="Login">

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="ui input field">
                        <input id="email" type="text"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
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
                    <div class="ui input field">
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required placeholder="Powtórz hasło">
                    </div>
                    <button class="ui button">Zarejestruj</button>
                </form>
            </div>
            <div class="extra content">
                <a class="nav-link" href="{{ route('login') }}">Logowanie</a>
                <a class="nav-link" href="{{ route('register') }}">Rejestracja</a>
            </div>
        </div>
    </div>
@endsection
