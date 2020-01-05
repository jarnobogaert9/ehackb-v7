<div class="games">
    @foreach($games->chunk(3) as $row)
        <div class="card-deck">
            @foreach($row as $index => $game)
                <div class="card">
                    <img src="{{ asset('imgs/games/'.$game->thumbnail) }}" class="card-img-top" alt="" title="{{ $game->name }}"/>
                    <div class="card-body">
                        <h3 class="card-title">{{ $game->name }}</h3>
                        <p class="card-text">{{ \Carbon\Carbon::createFromFormat('H:i:s', $game->start_time)->format('H:i') }} | {{ $game->location }}</p>
                    </div>
                </div>
            @endforeach
            @for($index = $row->count() % 3; $index % 3 !== 0; $index++)
                <div class="card bg-transparent border-0"></div>
            @endfor
        </div>
    @endforeach
</div>