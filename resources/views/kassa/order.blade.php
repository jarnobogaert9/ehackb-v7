@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!empty($failed))
            <div class="alert alert-danger alert-error" role="alert">
                Te weinig krediet beschikbaar
            </div>
        @endif
        <h1>Bestelling voor: {{$user->username}}</h1>
        <div class="row product-row">
            @forelse($products as $index => $product)

                @if($index % 2 == 0 && $index != 0)
        </div>
        <div class="row product-row">
            @endif

            <div class="col-6">
                <div class="product-tile">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('imgs/products/'.$product->photo) }}" alt="" class="productImg">
                        </div>
                        <div class="col-8">
                            <h1>{{ $product->name }}</h1>
                            <h3>€ {{ $product->price }}</h3>
                            <form action="{{route('kassa.placeOrder', $user->id)}}" method="post" class="foodForm">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <input type="hidden" name="price" value="{{$product->price}}">
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <input type="hidden" name="name" value="{{$product->name}}">
                                    <input type="number" class="form-control amount" name="amount" aria-describedby="amount"
                                           placeholder="Amount" value="{{old('amount')}}" min="1" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @empty
                <p>There currently are no products...</p>
            @endforelse
        </div>
    </div>
@endsection
