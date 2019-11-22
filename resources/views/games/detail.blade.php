<div>
    <img src="{{ asset('imgs/games/'.$game->thumbnail) }}" alt="" title="{{ $game->name }}"/>
    <h3>{{ $game->name }}</h3>
    <p>{{ $game->start_time }}|{{ $game->location }}</p>
    <form action="{{ route('games.delete', $game->id) }}" method="post">
        @csrf
        @method('DELETE')

        <input type="submit" value="Delete game"/>
    </form>
</div>
