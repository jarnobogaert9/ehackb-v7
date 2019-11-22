<div class="games">
    <div class="row">
        @foreach($games as $index => $game)
            @if($index-1 % 3 == 0 && $index-1 != 0)
                </div>
                <div class="row">
            @endif
            <div class="col-md-4">
                <img src="{{ asset('imgs/games/'.$game->thumbnail) }}" alt="" title="{{ $game->name }}"/>
                <h3>{{ $game->title }}</h3>
                <h3>{{ $game->name }}</h3>
                <p>{{ \Carbon\Carbon::createFromFormat('H:i:s', $game->start_time)->format('H:i') }} | {{ $game->location }}</p>
            </div>
        @endforeach
    </div>
</div>