<div class="teams">
    @if(!isset($given_user))
        <?php $given_user = Auth::user(); ?>
    @endif
    @foreach($teams->chunk(3) as $row)
        <div class="card-deck">
            @foreach($row as $index => $team)
                <a class="card" href="{{ route('teams.one', $team->id) }}">
                    <img src="{{ asset('imgs/games/'.$team->game->thumbnail) }}" class="card-img-top" alt="" title="{{ $team->name }}"/>
                    <div class="card-body">
                        <h3 class="card-title">{{ $team->name }}@if($team->creator->id === $given_user->id)<i class="material-icons" title="Captain">star</i>@endif</h3>
                        <p class="card-text">Captain: {{ $team->creator->username }}</p>
                    </div>
                </a>
            @endforeach
            @for($index = $row->count() % 3; $index % 3 !== 0; $index++)
                <div class="card bg-transparent border-0"></div>
            @endfor
        </div>
    @endforeach
</div>