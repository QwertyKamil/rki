@extends('admin.layout.admin')

@section('content')
    <div id="app">
        <div class="ui grid">
            <h2 class="list-title">Konkurs {{$contest->name}}, cześć {{$part->name}} lista pytań - dodaj</h2>
        </div>
        {!! Form::open(['method' => 'post',"class"=>"ui form mt-50"]) !!}
        <div class="ui centered grid">

            <div class="fourteen wide tablet twelve wide computer column">
                <div class="field">
                    {!! Form::text('name',null,['class'=>'','placeholder'=>'Pytanie']) !!}
                </div>
                <div class="field">
                    {!! Form::number('weight',1,['class'=>'','placeholder'=>'waga']) !!}
                </div>
                <div class="field">
                    {!! Form::textarea('text',null,['class'=>'']) !!}
                </div>
                <questionadd></questionadd>
                <div style="text-align: right">
                    <button class="ui button big">Dodaj</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    @include('ckfinder::setup')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        var editor = CKEDITOR.replace( 'text' );
        CKFinder.setupCKEditor( editor );
    </script>
@endsection
