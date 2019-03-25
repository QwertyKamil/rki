@extends('admin.layout.admin')

@section('content')
    <div>
        <div class="ui grid">
            <h2 class="list-title">Odpowiedź użytkownika {{$answer->user->name}}</h2>
        </div>
        {!! Form::model($answer, ['method' => 'post',"class"=>"ui form mt-50"]) !!}
        <div class="ui centered grid">

            <div class="fourteen wide tablet twelve wide computer column">
                <div>
                    {!! Form::text('answer',null,['class'=>'','disabled']) !!}
                </div>
                <div>
                    {!! Form::number('correct',null,['class'=>'','placeholder'=>'Ilosc punktów']) !!}
                </div>
                <div style="text-align: right">
                    <button class="ui button big">Zapisz</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
