@extends('layouts.app')

@section('content')
<section id="titleSection">
    <div class="centerVertical">
        <div class="container">
            <h1>Prepare for EhackBv7</h1>
            @auth
                <a href="{{ route('users.ownProfile') }}" class="btn btn-danger mr-2">View profile</a>
            @else
                <a href="{{ route('register') }}" class="btn btn-danger mr-2">Sign Up</a>
            @endauth
            <button class="btn btn-outline-light" id="learnMore">Learn more</button>
        </div>
    </div>
</section>
<section id="gameSection">
    <div class="centerVertical">
        <div class="container">
            <h1>Competitions</h1>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    @foreach(\App\Game::all() as $index => $game)
                        @if($index % 2 == 0 && $index != 0)
                            </div>
                            <div class="item">
                        @endif

                            <a href="#" class="col-md-4">
                                <img src="{{ asset('imgs/games/'.$game->thumbnail) }}" alt=""/>
                            </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section id="talkSection">
    <div class="row">
        <div class="col-md-6 displayTable">
            <div class="centerVertical">
                <div class="container">
                    <div class="row">
                        <h1>Talks</h1>
                    </div>
                    <div class="row">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum.</p>
                        <a href="{{ route('talks.index') }}" class="btn btn-danger">Discover Talks<i class="material-icons">chevron_right</i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 halfPane">
            <div class="displayTable">
                <div class="centerVertical">
                    <img src="{{ asset('imgs/talks_icon.png') }}" alt=""/>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="locationSection">
    <div class="centerVertical">
        <div class="container">
            <h1>Location</h1>
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1Q2BbUUQ6uKPsDSmi_VT4pEIZjBM4Wo2U"></iframe>
        </div>
    </div>
</section>
<section id="sponsorSection">
    <div class="centerVertical">
        <div class="container">
            <h1>Sponsors</h1>
            <div class="row">
                <?php
                $sponsors = App\Sponsor::all()->sortBy('tier');
                $prevTier = $sponsors->first()->tier;
                ?>
                @foreach($sponsors as $index => $sponsor)
                    @if($index-1 % (2 + $sponsor->tier) == 0 && $index-1 != 0 || $sponsor->tier != $prevTier)
                        <?php $prevTier = $sponsor->tier ?>
                        </div>
                        <div class="row">
                    @endif
                    <a href="{{ $sponsor->url }}" class="col-md-{{ 5-$sponsor->tier }}">
                        <div class="displayTable">
                            <div class="centerVertical">
                                <img src="{{ asset('imgs/sponsors/'.$sponsor->logo) }}" alt="" title="{{ $sponsor->name }}"/>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<div class="nextStepDiv">
    <div class="container">
        <div class="row">
            <button class="btn btn-outline-light ml-auto" id="nextStep">
                <i class="material-icons">expand_more</i>
            </button>
        </div>
    </div>
</div>

<script src="{{ asset('js/homepage.js') }}"></script>
@endsection