@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="products">
            @foreach($products->chunk(3) as $row)
                <div class="card-deck">
                    @foreach($row as $index => $product)
                        <div class="card" id="{{ $product->id }}">
                            <img src="{{ asset('storage/'.$product->photo) }}" class="card-img-top" alt="" title="{{ $product->name }}"/>
                            <div class="card-body">
                                <h3 class="card-title">{{ $product->name }}</h3>
                                <p class="card-text">&euro;<span>{{ $product->price }}</span></p>
                            </div>
                        </div>
                    @endforeach
                    @for($index = $row->count() % 3; $index % 3 !== 0; $index++)
                        <div class="card bg-transparent border-0"></div>
                    @endfor
                </div>
            @endforeach
        </div>
    </div>
@endsection
