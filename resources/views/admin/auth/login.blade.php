@extends('admin.layout.login-admin')

@section('content')
    <div class="centred-container">
        <div class="ui raised very padded text container segment">
            <h1 class="ui header">Logowanie</h1>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            @endif
            <form method="POST" class="ui form" action="{{ route('admin.login') }}" aria-label="{{ __('Login') }}">
                @csrf
                <div class="field">
                    <label>E-mail</label>
                    <input type="email" name="email" placeholder="E-mail">
                </div>
                <div class="field">
                    <label>Hasło</label>
                    <input type="password" name="password" placeholder="Hasło">
                </div>
                <button class="ui button" type="submit">Zaloguj</button>
            </form>
        </div>
    </div>
@endsection
