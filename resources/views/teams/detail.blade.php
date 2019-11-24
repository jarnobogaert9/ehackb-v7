@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="{{ asset('imgs/games/'.$team->game->thumbnail) }}" alt="" title="{{ $team->game->name }}"/>
        <h3>{{ $team->name }}</h3>
        <h5>Members: {{ $team->members->count() + 1 }}</h5>
        <ul>
            <li><a href="{{ route('users.profile', $team->creator->id) }}">{{ $team->creator->username }} CAPTAIN</a></li>
            @foreach($team->members as $member)
                <li><a href="{{ route('users.profile', $member->id) }}">{{ $member->username }}</a></li>
            @endforeach
        </ul>

        <!--TODO: In controller ook checken!!-->
        @if(Auth::user()->id == $team->creator->id)
            <form action="{{ route('teams.delete', $team->id) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Delete talk"/>
            </form>
        @endif
    </div>
@endsection