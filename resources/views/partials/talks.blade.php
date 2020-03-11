<div class="talks">
    @foreach($talks->chunk(3) as $row)
        <div class="card-deck">
            @foreach($row as $index => $talk)
                <a class="card" href="{{ route('talks.one', $talk->id) }}">
                    <img src="{{ asset('storage/'.$talk->photo) }}" class="card-img-top" alt="" title="{{ $talk->title }}"/>
                    <div class="card-body">
                        <h3 class="card-title">{{ $talk->title }}</h3>
                        <p class="card-text">{{ \Carbon\Carbon::createFromFormat('H:i:s', $talk->start_time)->format('H:i') }} | {{ $talk->speaker }}</p>
                        <p class="card-text">{{ $talk->excerpt }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $talk->available_places }}/{{ $talk->max_places }} places available</li>
                    </ul>
                </a>
            @endforeach
            @for($index = $row->count() % 3; $index % 3 !== 0; $index++)
                <div class="card bg-transparent border-0"></div>
            @endfor
        </div>
    @endforeach
</div>