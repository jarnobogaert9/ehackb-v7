<div class="teams">
    <div class="row">
        @foreach($teams as $index => $team)
            @if($index-1 % 3 == 0 && $index-1 != 0)
                </div>
                <div class="row">
            @endif
            <a class="col-md-4" href="{{ route('teams.one', $team->id) }}">
                <img src="{{ asset('imgs/games/'.$team->game->thumbnail) }}" alt="" title="{{ $team->name }}"/>
                <h3>{{ $team->name }}</h3>
                <p>Captain: {{ $team->creator->username }}</p>
            </a>
        @endforeach
    </div>
</div>