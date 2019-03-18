@if(session('success'))
    <div class="ui positive message">
        <i class="close icon"></i>
        <div class="header">
            Sukces
        </div>
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif

@if(session('error'))
    <div class="ui negative message">
        <i class="close icon"></i>
        <div class="header">
            Błąd - przepraszamy
        </div>
        <p>
            {{ session('error') }}
        </p>
    </div>
@endif