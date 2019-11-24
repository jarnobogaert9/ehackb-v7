@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Create your team</h3>
        <form action="{{ route('teams.store') }}" method="post">
            @csrf
            <label for="name">Team name</label>
            <input type="text" name="name" id="name" autofocus required/>
            <label for="game">Game</label>
            <select name="game_id" id="game" required>
                @foreach($games as $game)
                    <option value="{{ $game->id }}">{{ $game->name }}</option>
                @endforeach
            </select>

            <input type="submit" value="Create Team"/>
        </form>
    </div>
@endsection