@extends('layouts.app')

@section('content')
    <div id="progressbar"></div>
    <div class="jumbotron">
        <div class="container">
            <div class="title-section">
                <p id="main-title">Ehackbv7 - test2</p>
                <p id="sub-title">Gaming. Tournaments. E-Sports. LAN. Hacking. Keynotes. Boardgames. Movies. Technology.
                    Explore. Meet. Food. Drinks. Enjoy.</p>
                <p id="datum">24 - 25 April 2020</p>
            </div>

            <div class="timer">
                <div class="row">
                    <div class="col-6">
                        <div id="countdown">
                            <table>
                                <tr id="timer">
                                    <td id="days"></td>
                                    <td id="hours"></td>
                                    <td id="mins"></td>
                                    <td id="secs"></td>
                                </tr>
                                <tr id="countdowntxt">
                                    <td>DAYS</td>
                                    <td>HRS</td>
                                    <td>MINS</td>
                                    <td>SECS</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div id="inschrijvingen">
                            <h3>PARTICIPANTS</h3>
                            <h4>243/500</h4>
                            <p id="inschrijvingen-text">Schrijf je nu in!</p>
                        </div>
                    </div>
                </div>

            </div>

            <div id="credits">
                <!--TO DO: Credit bg -->
            </div>
        </div>
    </div>
    <!--<canvas id=c></canvas>-->
    <script src="{{asset('js/hexagons.js')}}"></script>
    <script src="{{asset('js/timer.js')}}"></script>
    <script src="{{asset('js/scroll.js')}}"></script>
@endsection
