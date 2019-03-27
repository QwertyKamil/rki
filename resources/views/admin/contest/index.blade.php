@extends('admin.layout.admin')

@section('content')
    <div>
        <div class="ui grid">
            <div class="ui large eight wide column">
                <h2 class="list-title">Lista konkursów</h2>
            </div>
            <div class="right aligned eight wide column search-container">
                <a class="btn-add" href="{{route('admin.admin-contests-add')}}"><i class="far fa-plus"></i> Dodaj konkurs</a>
            </div>
        </div>

        <table class="ui celled table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Link</th>
                <th>Ilość pytań</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contests as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ route('test',$item->token) }}</td>
                    <td>{{ count($item->questions()) }}</td>
                    <td class="list-actions">
                        <a href="{{route('admin.admin-contests-edit', $item)}}" class="btn-table">Edytuj</a>
                        <a href="{{route('admin.admin-parts', $item)}}" class="btn-table">Części</a>
                        <a href="{{route('admin.admin-contest-users', ['contest'=>$item])}}" class="btn-table">Uczestnicy/odpowiedzi</a>
                        <a href="{{route('admin.admin-contests-export', $item)}}" class="btn-table">Pobierz wyniki (xslx)</a>

                        <a href="#" class="btn-table"
                           onclick="$('.ui.basic.modal-{{$item->id}}').modal('show');">Usuń</a>
                        <div class="ui basic modal modal-{{$item->id}}">
                            <div class="ui icon header">
                                <i class="archive icon red"></i>
                                Usuń test
                            </div>
                            <div class="content">
                                <p>Czy na pewno usunąć test {{ $item->name }} ?</p>
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
                                {!! Form::open(['route'=>['admin.admin-contests-delete',$item],'method'=>'DELETE']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="5">
                    {{ $contests->links('admin.layout.pagination') }}
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
