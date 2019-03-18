{{--TOPBAR--}}
<div class="ui fixed inverted main menu">
    <div class="container">
        <a class="launch icon item" onclick="$('.ui.sidebar').sidebar('toggle');">
            <i class="content icon"></i>
        </a>

        <div class="item">
        </div>

        <div class="right menu">


        </div>
    </div>
</div>
{{--TOPBAR--}}


{{--MOBILE MENU--}}
<div class="ui left vertical inverted sidebar menu">
    <a class="item @if(\Route::current()->getName() == 'admin.admin-users')current @endif" href="{{ route('admin.admin-users') }}">
        Lista klientów
    </a>
    <a class="item @if(\Route::current()->getName() == 'admin.admin-sites')current @endif" href="{{ route('admin.admin-sites') }}">
        Lista stron
    </a>
    <a class="item @if(\Route::current()->getName() == 'admin.admin-payments')current @endif" href="{{ route('admin.admin-payments') }}">
        Płatności i faktury
    </a>
    <a class="item @if(\Route::current()->getName() == 'admin.admin-settings')current @endif" href="{{ route('admin.admin-settings') }}">
        Ustawienia
    </a>
    <a class="item @if(\Route::current()->getName() == 'admin.admin-app')current @endif" href="{{ route('admin.admin-app') }}">
        Aplikacja - do pobrania
    </a>
</div>
{{--MOBILE MENU--}}


{{--DESKTOP MENU--}}
<div class="toc">
    <div class="ui vertical inverted menu">
        <a class="item @if(\Route::current()->getName() == 'admin.admin-users')current @endif" href="{{ route('admin.admin-users') }}">
            Lista klientów
        </a>
        <a class="item @if(\Route::current()->getName() == 'admin.admin-sites')current @endif" href="{{ route('admin.admin-sites') }}">
            Lista stron
        </a>
        <a class="item @if(\Route::current()->getName() == 'admin.admin-payments')current @endif" href="{{ route('admin.admin-payments') }}">
            Płatności i faktury
        </a>
        <a class="item @if(\Route::current()->getName() == 'admin.admin-area')current @endif" href="{{ route('admin.admin-area') }}">
            Rejony
        </a>
        <a class="item @if(\Route::current()->getName() == 'admin.admin-settings')current @endif" href="{{ route('admin.admin-settings') }}">
            Ustawienia
        </a>
        <a class="item @if(\Route::current()->getName() == 'admin.admin-app')current @endif" href="{{ route('admin.admin-app') }}">
            Aplikacja - do pobrania
        </a>
    </div>
</div>
{{--DESKTOP MENU--}}
