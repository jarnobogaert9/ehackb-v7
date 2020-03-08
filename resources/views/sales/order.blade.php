@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!empty($failed))
            <div class="alert alert-danger alert-error" role="alert">
                Te weinig krediet beschikbaar
            </div>
        @endif
        <h1>Eten bestellen voor {{$user->username}}</h1>

        <div class="row">
            <div class="col-md-8">
                @foreach($products->chunk(3) as $row)
                    <div class="card-columns">
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

                <div class="row ml-0 mr-0">

                </div>
            </div>


            <div class="col-md-4">
                <div class="card" id="amountToDeposit">
                    <div class="card-body">
                        <h5 class="card-title">Totaal: &euro;<span>0</span></h5>
                    </div>
                    <ul class="list-group list-group-flush" id="history">
                        <li class="list-group-item d-flex">
                            <form action="{{ route('sales.placeOrder', $user->id) }}" method="post" id="form">
                                @csrf

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Bevestig') }}
                                </button>
                            </form>

                            <a href="{{ route('sales.manageAccount', $user->id) }}" class="btn outlineBtn ml-1">
                                {{ __('Annuleer') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php
        $keyed = $products->mapWithKeys(function ($item) {
            return [$item['id'] => $item];
        });
    ?>

    <script>
        let products = @json($keyed);
    </script>

    <script src="{{ asset('js/orderProducts.js') }}"></script>
@endsection
