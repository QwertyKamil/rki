<table>
    <thead>
    <tr>
        <th>Login</th>
        @foreach($contest->parts as $part)
            @foreach($part->questions as $question )
                <th>{{$question->name}}</th>
            @endforeach
            <th>Suma</th>
        @endforeach
        <th>Wynik</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            @php
                $_user = \App\User::where('id',$user->user_id)->first();
                    $suma_all = 0;
            @endphp
            <td>
                {{$_user->name}}
            </td>
            @foreach($contest->parts as $part)
                @php
                    $suma = 0;
                @endphp
                @foreach($part->questions as $question)
                    @php
                        $answer = \App\UsersAnswer::where('question_id',$question->id)->where('user_id',$user->user_id)->first();
                        if($answer){
                            $suma += $answer->correct;
                        }
                    @endphp
                    @if($answer)
                        <td>{{$answer->correct}} pkt</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
                @php
                    $suma_all += $suma;
                @endphp
                <td>{{$suma}}</td>
            @endforeach
            <td>{{$suma_all}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
