<div class="nieuws">
    @foreach($nieuws->chunk(3) as $row)
        <div class="card-deck">
            @foreach($row as $index => $nieuwtje)
                <a class="card" href="{{ route('nieuws.one', $nieuwtje->id) }}">
                    <div class="card-body">
                        <h3 class="card-title">{{ $nieuwtje->title }}</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $nieuwtje->created_at)->format('d/m/Y H:i') }}</li>
                    </ul>
                </a>
            @endforeach
            @for($index = $row->count() % 3; $index % 3 !== 0; $index++)
                <div class="card bg-transparent border-0"></div>
            @endfor
        </div>
    @endforeach
</div>