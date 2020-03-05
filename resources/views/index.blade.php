@extends('layouts.app')

@section('content')
    <div id="progressbar"></div>
    <div class="content slanted">
        <!-- test brecht -->
        <h1>good meme</h1>
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
