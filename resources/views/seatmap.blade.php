@extends('layouts.app')

@section('content')
    <style>
        .table-wrapper{
            background-color: white;
        }

        .table-wrapper .row{
            margin: 0;
        }

        .col-sm-6{
            -webkit-box-flex: 0;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .table-wrapper .row .col-sm-6{
            padding: 0;
        }

        .seatmap-table{
            border: 1px solid black;
            height: 50px;
            width: 100px;
            margin: 0.25rem 0;
        }

        .seat{
            display: table;
            margin: 0 auto;
            background-color: #02B9B5;
            color: white;
            border-radius: 0.5rem;
            height: 2rem;
            width: 2rem;
            cursor: pointer;
        }

        .seat p{
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            margin: 0;
        }

        .unavailable{
            background-color: #F16EA4;
            cursor: not-allowed;
        }

        .selected{
            background-color: #F7B994;
        }
    </style>

    <div class="container">
        <h3>Select seats for {{ $team->name }}</h3>
        <h4 id="currSeats">Seats left: <span>{{ ($team->members->count() + 1) - $team->seats->count() }}</span></h4>
        <div class="row table-row">
            @for($i = 0; $i < 5; $i++)
            <div class="table-wrapper">
                <div class="row">
                    <div class="col-sm-6"><div class="seat" id="seat{{ $i * 4 + 1 }}"><p>{{ $i * 4 + 1 }}</p></div></div>
                    <div class="col-sm-6"><div class="seat" id="seat{{ $i * 4 + 2 }}"><p>{{ $i * 4 + 2 }}</p></div></div>
                </div>
                <div class="col-md-12 seatmap-table"></div>
                <div class="row">
                    <div class="col-sm-6"><div class="seat" id="seat{{ $i * 4 + 3 }}"><p>{{ $i * 4 + 3 }}</p></div></div>
                    <div class="col-sm-6"><div class="seat" id="seat{{ $i * 4 + 4 }}"><p>{{ $i * 4 + 4 }}</p></div></div>
                </div>
            </div>
            @endfor
        </div>

        <div class="row">
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

    <script>
        'use strict';
        let maxSeats = {{ $team->members->count() + 1 }};
        let currSeats = {{ ($team->members->count() + 1) - $team->seats->count() }};
        <?php $test = App\Seat::where('team_id', '!=', 0)->where('team_id', '!=', $team->id)->get()->pluck('id'); ?>
        let occupied = @json($test);
        let owned = @json(App\Seat::where('team_id', $team->id)->get()->pluck('id'));

        $(function () {
            function appendForm(num){
                $('#submitForm').append($(`<input type="hidden" name="selectedSeats[]" value="${num}" id="${num}"/>`));
                currSeats--;
            }

            function removeFromForm(num){
                $(`#${num}`).remove();
                currSeats++;
            }

            //Door elementen zo aan te passen, kan men de styling en structuur van de seatmap zelf aanpassen zolang ze hun id hebben
            occupied.forEach(function (curr) {
                $(`#seat${curr}`).addClass('unavailable');
            });
            owned.forEach(function (curr) {
                $(`#seat${curr}`).addClass('selected');
            });

            $('.seat').not('.unavailable').click(function (e) {
                if($(this).hasClass('selected') && currSeats !== maxSeats) {
                    removeFromForm($(this).children('p')[0].textContent);
                    $(this).removeClass('selected');
                }
                else if(!$(this).hasClass('selected') && currSeats > 0){
                    appendForm($(this).children('p')[0].textContent);
                    $(this).addClass('selected');
                }
                $('#currSeats span').text(currSeats);
            });
        });
    </script>
@endsection