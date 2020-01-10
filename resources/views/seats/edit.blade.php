@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profilePane">
            <h3>Select seats for {{ $team->name }}</h3>
            <hr/>
            <h4 id="currSeats">Seats left: <span>{{ ($team->members->count() + 1) - $team->seats->count() }}</span></h4>
            @include('partials.seatmap')

            <div class="btnBar">
                <form action="{{ route('seats.claim', $team->id) }}" method="post" id="submitForm">
                    @csrf
                    @method('PUT')
                    @foreach($team->seats as $seat)
                        <input type="hidden" name="selectedSeats[]" value="{{ $seat->id }}" id="{{ $seat->id }}"/>
                    @endforeach
                    <input type="submit" class="btn outlineBtn" value="Confirm seats"/>
                </form>
            </div>
        </div>
    </div>

    <script>
        'use strict';
        let maxSeats = {{ $team->members->count() + 1 }};
        let currSeats = {{ ($team->members->count() + 1) - $team->seats->count() }};
        <?php $test = App\Seat::where('team_id', '!=', null)->where('team_id', '!=', $team->id)->get()->pluck('id'); ?>
        let occupied = @json($test);
        let owned = @json(App\Seat::where('team_id', $team->id)->get()->pluck('id'));
    </script>
    <script src="{{ asset('js/displaySeatStatus.js') }}"></script>
    <script src="{{ asset('js/updateSeatStatus.js') }}"></script>
@endsection