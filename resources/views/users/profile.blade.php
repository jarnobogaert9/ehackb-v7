@extends('layouts.app')

@section('content')
<div class="container">
    <?php $ownProfile = false ?>
    @if(Auth::user()->id == $user->id)
        <?php $ownProfile = true ?>
    @endif
    <div class="profilePane userProfile">
        <img src="" alt=""/>
        <h3>{{ $user->username }}</h3>
        <p>{{ $user->first_name.' '.$user->last_name }}</p>
        <p>{{ $user->email }}</p>
    </div>

    <div class="profilePane">
        <h4>Teams</h4>
        <hr>
        <div class="teams">
            <?php $index = 0 ?>
            <div class="row">
                @foreach($user->created_teams as $team)
                    @if($index-1 % 3 == 0 && $index-1 != 0)
                        </div>
                        <div class="row">
                    @endif
                    <a class="col-md-4" href="{{ route('teams.one', $team->id) }}">
                        <img src="{{ asset('imgs/games/'.$team->game->thumbnail) }}" alt="" title="{{ $team->name }}"/>
                        <h3>{{ $team->name }} [STAR]</h3>
                        <p>Captain: {{ $team->creator->username }}</p>
                    </a>
                    <?php $index++ ?>
                @endforeach
                @foreach($user->teams as $team)
                    @if($index-1 % 3 == 0 && $index-1 != 0)
                        </div>
                        <div class="row">
                    @endif
                    <a class="col-md-4" href="{{ route('teams.one', $team->id) }}">
                        <img src="{{ asset('imgs/games/'.$team->game->thumbnail) }}" alt="" title="{{ $team->name }}"/>
                        <h3>{{ $team->name }}</h3>
                        <p>Captain: {{ $team->creator->username }}</p>
                    </a>
                    <?php $index++ ?>
                @endforeach
            </div>
        </div>
        @if($ownProfile)
            <div class="btnBar">
                <a class="btn outlineBtn" href="{{ route('teams.index') }}">Add team</a>
                <a class="btn inlineBtn" href="{{ route('teams.create') }}">Create team</a>
            </div>
        @endif
    </div>

    <div class="profilePane">
        <h4>Talks</h4>
        <hr>
        <?php $talks = $user->subscribed_talks ?>
        @include('partials.talks')
        @if($ownProfile)
            <div class="btnBar">
                <a class="btn outlineBtn" href="{{ route('talks.index') }}">Add talk</a>
            </div>
        @endif
    </div>
</div>
@endsection