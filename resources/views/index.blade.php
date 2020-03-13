@extends('layouts.app')

@section('content')
    <div id="progressbar"></div>
    <div class="content slanted">
        <div class="jumbotron">
            <div class="container">
                <div class="title-section">
                    <p id="main-title">Ehackb<span id="vTitle">v</span>7</p>
                    <p id="sub-title">Gaming. Tournaments. E-Sports. LAN. Hacking. Keynotes. Boardgames. Movies.
                        Technology.
                        Explore. Meet. Food. Drinks. Enjoy.</p>
                    <p id="datum">24 - 25 April 2020</p>
                </div>
            </div>
        </div>
        <div class="black-bg">
            <div class="container">
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
                            <div id="inschrijvingen-btn">
                                <a href="{{ route('register') }}">
                                    <h1 id="btn-h1">
                                        Schrijf je in!
                                    </h1>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recentnews container">
                <div class="row">
                    <div class="col-6">
                        <h3>LATEST UPDATES <a href="{{ route('nieuws.index') }}"><i class="small material-icons pink">open_in_new</i></a></h3>
                        @foreach($nieuws as $n)
                            <div class="news-item">
                                <h5 class="newstitle">{{ $n->title }}</h5>
                                <p class="news-body">{{substr($n->body, 0, 300)."..."}}</p>
                                <a href="{{ route('nieuws.one', $n->id) }}" class="meer-info">Meer info</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.sponsors')
    <footer class="slanted-top">
        <div id="credits">
            <!--TO DO: Credit neon_bg -->
            <p class="copy">Copyright &copy; 2020 EhackB. All Rights Reserved.</p>
        </div>
    </footer>
    <!--<canvas id=c></canvas>-->
    <script src="{{asset('js/hexagons.js')}}"></script>
    <script src="{{asset('js/timer.js')}}"></script>
    <script src="{{asset('js/scroll.js')}}"></script>
@endsection
