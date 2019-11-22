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
        <table>
            @if($user->teams()->exists())
            @foreach($user->teams as $team)
                <tr>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->game->name }}</td>
                </tr>
            @endforeach
            @else
                <p>
                    @if($ownProfile)
                        You do
                    @else
                        This user does
                    @endif
                    not have any teams yet...
                </p>
            @endif
        </table>
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
        <div class="row">
            <?php $talks = $user->subscribed_talks ?>
            @include('partials.talks')
        </div>
        @if($ownProfile)
            <div class="btnBar">
                <a class="btn outlineBtn" href="{{ route('talks.index') }}">Add talk</a>
            </div>
        @endif
    </div>
</div>
@endsection