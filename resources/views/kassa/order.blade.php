@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!empty($failed))
            <div class="alert alert-danger alert-error" role="alert">
                Te weinig krediet beschikbaar
            </div>
        @endif
        <h1>Eten bestellen voor {{$user->username}}</h1>

        @foreach($products->chunk(3) as $row)
            <div class="card-columns col-md-9">
                @foreach($row as $index => $product)
                    <div class="card">
                        <img src="{{ asset('imgs/products/'.$product->photo) }}" class="card-img-top" alt="" title="{{ $product->name }}"/>
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <p class="card-text">&euro;{{ $product->price }}</p>
                        </div>
                    </div>
                @endforeach
                @for($index = $row->count() % 3; $index % 3 !== 0; $index++)
                    <div class="card bg-transparent border-0"></div>
                @endfor
            </div>
        @endforeach
    </div>
@endsection
