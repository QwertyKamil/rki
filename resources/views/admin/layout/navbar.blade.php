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
    <a class="item @if(\Route::current()->getName() == 'admin.admin-contests')current @endif"
       href="{{route('admin.admin-contests')}}">
        Lista konkursów
    </a>
</div>
{{--MOBILE MENU--}}


{{--DESKTOP MENU--}}
<div class="toc">
    <div class="ui vertical inverted menu">
        <a class="item @if(\Route::current()->getName() == 'admin.admin-contests')current @endif"
           href="{{route('admin.admin-contests')}}">
            Lista konkursów
        </a>
    </div>
</div>
{{--DESKTOP MENU--}}
