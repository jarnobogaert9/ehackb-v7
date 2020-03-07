@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row product-row">
            @forelse($products as $index => $product)
                @if($product->id != 999999)
                    @if($index % 2 == 0 && $index != 0)
                    </div>
                    <div class="row product-row">
                    @endif

                    <div class="col-6">
                        <div class="product-tile">
                            <div class="row">
                                <div class="col-4">
                                  <img src="{{ asset('storage/'.$product->photo)}}" alt="" class="productImg">
                                </div>
                                <div class="col-8">
                                    <h1>{{ $product->name }}</h1>
                                    <h3>€ {{$product->price}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <p>There currently are no products...</p>
            @endforelse
        </div>
    </div>
@endsection
