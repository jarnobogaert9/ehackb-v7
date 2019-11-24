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
        <?php $teams = $user->teams ?>
        @include('partials.teams')
        @if($ownProfile)
            <div class="btnBar">
                <a class="btn outlineBtn" href="{{ route('games.index') }}">Add team</a>
                <a class="btn inlineBtn" href="{{ route('games.create') }}">Create team</a>
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