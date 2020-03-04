<div class="bg-white sponsors">
    <div class="container">
        <h2>Sponsors</h2>
        <div class="container">
            <div class="row" id="tierOne">
                @foreach($sponsors['one'] as $s)
                    <div class="col">
                        <img src="{{asset('imgs/sponsors/'.$s->logo)}}" alt="">
                    </div>
                @endforeach
            </div>
            <div class="row" id="tierTwo">
                @foreach($sponsors['two'] as $s)
                    <div class="col">
                        <img src="{{asset('imgs/sponsors/'.$s->logo)}}" alt="">
                    </div>
                @endforeach
            </div>
            <div class="row" id="tierThree">
                @foreach($sponsors['three'] as $s)
                    <div class="col">
                        <img src="{{asset('imgs/sponsors/'.$s->logo)}}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
