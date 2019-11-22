<div class="talks">
    <div class="row">
    @foreach($talks as $index => $talk)
        @if($index-1 % 3 == 0 && $index-1 != 0)
            </div>
            <div class="row">
        @endif
        <a class="col-md-4" href="{{ route('talks.one', $talk->id) }}">
            <img src="{{ asset('imgs/talks/'.$talk->photo) }}" alt="" title="{{ $talk->title }}"/>
            <h3>{{ $talk->title }}</h3>
            <p>{{ $talk->available_places }}/{{ $talk->max_places }} places available</p>
            <p>{{ $talk->excerpt }}</p>
            <p>{{ \Carbon\Carbon::createFromFormat('H:i:s', $talk->start_time)->format('H:i') }} - {{ Carbon\Carbon::createFromFormat('H:i:s', $talk->end_time)->format('H:i') }} | {{ $talk->speaker }}</p>
        </a>
    @endforeach
    </div>
</div>