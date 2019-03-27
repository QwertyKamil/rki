@extends('admin.layout.admin')

@section('content')
    <div id="app">
        <div class="ui grid">
            <h2 class="list-title">Konkurs {{$contest->name}}, cześć {{$part->name}} lista pytań - edytuj</h2>
        </div>
        {!! Form::model($question, ['method' => 'post',"class"=>"ui form mt-50"]) !!}
        <div class="ui centered grid">

            <div class="fourteen wide tablet twelve wide computer column">
                <div class="field">
                    {!! Form::text('name',null,['class'=>'','placeholder'=>'Pytanie']) !!}
                    @if ($errors->has('name'))
                        <div class="ui pointing red basic label">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="field">
                    {!! Form::number('weight',1,['class'=>'','placeholder'=>'waga']) !!}
                    @if ($errors->has('weight'))
                        <div class="ui pointing red basic label">
                            {{ $errors->first('weight') }}
                        </div>
                    @endif
                </div>
                <div class="field">
                    {!! Form::textarea('text',null,['class'=>'']) !!}
                    @if ($errors->has('text'))
                        <div class="ui pointing red basic label">
                            {{ $errors->first('text') }}
                        </div>
                    @endif
                </div>
                <questionedit v-bind:questionid="{{$question->id}}" v-bind:_type="{{$question->type}}"></questionedit>
                <div style="text-align: right">
                    <button class="ui button big">Zapisz</button>
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
