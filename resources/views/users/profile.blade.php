@extends('layouts.app')

@section('content')
<div class="container">
    <?php $ownProfile = false ?>
    @if(Auth::user()->id == $user->id)
        <?php $ownProfile = true ?>
    @endif

    <div class="row">
        <div class="col-md-3">
            <div class="card-deck">
                <div class="card profileCard">
                    <div class="card-img-top">
                        <img src="{{ asset('imgs/icons/astronaut-user.png') }}" class="card-img-top" alt="">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $user->username }}</h3>
                        <p class="card-text mb-0">{{ $user->first_name.' '.$user->last_name }}</p>
                        @if($ownProfile)
                            <p class="card-text">{{ $user->email }}</p>
                        @endif
                        <a href="{{ route('users.profile.edit', Auth::user()->id) }}" class="btn btn-primary">Edit profile</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="profilePane">
                <h4>Teams</h4>
                <hr class="mb-4"/>
                <?php
                $teams = $user->created_teams->merge($user->teams);
                $given_user = $user;
                ?>
                @include('partials.teams')
                @if($ownProfile)
                    <div class="btnBar">
                        <a class="btn outlineBtn" href="{{ route('teams.index') }}">Add team</a>
                        <a class="btn inlineBtn" href="{{ route('teams.create') }}">Create team</a>
                    </div>
                @endif
            </div>

            <div class="profilePane">
                <h4>Talks</h4>
                <hr class="mb-4"/>
                <?php $talks = $user->subscribed_talks ?>
                @include('partials.talks')
                @if($ownProfile)
                    <div class="btnBar">
                        <a class="btn outlineBtn" href="{{ route('talks.index') }}">Add talk</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection