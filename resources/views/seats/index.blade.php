@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profilePane">
            <h3>Seat map for EhackBv7</h3>
            <hr/>
            @if(Auth::user()->created_teams->count() !== 0)
                <div class="btnBar">
                    <div class="dropdown">
                        <button class="btn inlineBtn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage seats
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach(Auth::user()->created_teams as $team)
                                <a class="dropdown-item" href="{{ route('seatmap.select', $team->id) }}">{{ $team->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @include('partials.seatmap')
        </div>
    </div>
    <script>
        'use strict';
        <?php $test = App\Seat::where('team_id', '!=', null)->get()->pluck('id'); ?>
        let occupied = @json($test);
        let owned = [];
    </script>
    <script src="{{ asset('js/displaySeatStatus.js') }}"></script>
@endsection