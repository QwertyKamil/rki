@extends('admin.layout.admin')

@section('content')
    <div>
        <div class="ui grid">
            <h2 class="list-title">Konkurs {{$contest->name}}, cześć {{$part->name}} lista pytań - edytuj</h2>
        </div>
        {!! Form::model($question, ['method' => 'post',"class"=>"ui form mt-50"]) !!}
        <div class="ui centered grid">

            <div class="fourteen wide tablet twelve wide computer column">
                <div class="field">
                    {!! Form::text('name',null,['class'=>'']) !!}
                </div>
                <div class="field">
                    {!! Form::number('weight',null,['class'=>'','placeholder'=>'waga']) !!}
                </div>
                <div>
                    {!! Form::textarea('text',null,['class'=>'']) !!}
                </div>
                <div>
                    {!! Form::number('type',null,['class'=>'']) !!}
                </div>
                <div style="text-align: right">
                    <button class="ui button big">Edytuj</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
