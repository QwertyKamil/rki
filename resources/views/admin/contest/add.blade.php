@extends('admin.layout.admin')

@section('content')
    <div>
        <div class="ui grid">
            <h2 class="list-title">Lista konkursów - dodaj</h2>
        </div>
        {!! Form::open(['method' => 'post',"class"=>"ui form mt-50"]) !!}
        <div class="ui centered grid">

            <div class="fourteen wide tablet twelve wide computer column">
                {!! Form::text('name',null,['class'=>'']) !!}
                <div style="text-align: right">
                    <button class="ui button big">Dodaj</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
