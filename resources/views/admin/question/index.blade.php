@extends('admin.layout.admin')

@section('content')
    <div>
        <div class="ui grid">
            <div class="ui large eight wide column">
                <h2 class="list-title">Konkurs {{$contest->name}}, cześć {{$part->name}} lista pytań</h2>
            </div>
            <div class="right aligned eight wide column search-container">
                <a class="btn-add" href="{{route('admin.admin-questions-add', ['contest'=>$contest,'part'=>$part])}}"><i class="far fa-plus"></i> Dodaj pytanie</a>
            </div>
        </div>

        <table class="ui celled table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($questions as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="list-actions">
                        {{--<a href="{{route('admin.admin-questions-edit', ['contest'=>$contest,'part'=>$part,'question'=>$item])}}" class="btn-table">Edytuj</a>--}}

                        <a href="#" class="btn-table"
                           onclick="$('.ui.basic.modal-{{$item->id}}').modal('show');">Usuń</a>
                        <div class="ui basic modal modal-{{$item->id}}">
                            <div class="ui icon header">
                                <i class="archive icon red"></i>
                                Usuń miasto
                            </div>
                            <div class="content">
                                <p>Czy na pewno usunąć miasto {{ $item->name }} ?</p>
                            </div>
                            <div class="actions">
                                <div class="ui red basic cancel inverted button">
                                    <i class="remove icon"></i>
                                    Nie
                                </div>
                                <div class="ui green ok inverted button"
                                     onclick="this.parentElement.querySelector('form').submit()">
                                    <i class="checkmark icon"></i>
                                    Tak
                                </div>
                                {!! Form::open(['route'=>['admin.admin-questions-delete','contest'=>$contest,'part'=>$part,'question'=>$item],'method'=>'DELETE']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="3">
                    {{ $questions->links('admin.layout.pagination') }}
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
