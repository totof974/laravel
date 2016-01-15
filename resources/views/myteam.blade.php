@extends("layout-test")


@section("content")



    {{dump($teamblade)}}


    @foreach ($teamblade as $team)
        @if($team['chef'] == true)

            <p>{{$team['firstname']}} {{$team['lastname']}} est le chef.</p>

        @endif
    @endforeach


    Il y a {{ count($teamblade) }} players dans ma team. 92i



@endsection

