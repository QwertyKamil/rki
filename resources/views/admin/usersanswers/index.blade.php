@extends('admin.layout.admin')

@section('content')
    <div>
        <div class="ui grid">
            <div class="ui large eight wide column">
                <h2 class="list-title">Konkurs {{$contest->name}}</h2>
            </div>
        </div>

        <table class="ui celled table">
            <thead>
            <tr>
                <th>ID</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach($item->getAnswers($contest) as $answer)
                    <tr>
                        <td></td>
                        <td>{{ strip_tags($answer->question->text )}}</td>
                        <td>{{$answer->answer}}</td>
                        <td>{{$answer->correct}}</td>
                        <td>
                            <a href="{{route('admin.admin-contest-users-edit',['contest'=>$contest,'answer'=>$answer])}}" class="btn-table">Edytuj</a>
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="4">
                    {{ $users->links('admin.layout.pagination') }}
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
