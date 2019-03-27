@extends('admin.layout.admin')

@section('content')
    <div>
        <div class="ui grid">
            <h2 class="list-title">Lista konkursów - edytuj</h2>
        </div>
        {!! Form::model($contest, ['method' => 'post',"class"=>"ui form mt-50"]) !!}
        <div class="ui centered grid">

            <div class="fourteen wide tablet twelve wide computer column">
                {!! Form::text('name',null,['class'=>'']) !!}
                @if ($errors->has('name'))
                    <div class="ui pointing red basic label">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <div style="text-align: right">
                    <button class="ui button big">Edytuj</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
