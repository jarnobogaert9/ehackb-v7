@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profilePane">
            <h3>Sales Data</h3>
            <hr/>

            <div id="accordion">
                @foreach($sales as $sale)
                    <div class="card">
                        <div class="card-header d-flex pb-0" id="heading{{ $sale->id }}">
                            <h5 class="mr-auto">{{ $sale->user->username }}</h5>
                            <p class="ml-auto" style="color:@if($sale->price >= 0) green">+ @else red">- @endif&euro;{{ abs($sale->price) }}</p>
                            <p class="ml-auto">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $sale->created_at)->format('d/m/Y H:i') }}</p>
                            <i class="material-icons ml-5" data-toggle="collapse" data-target="#collapse{{ $sale->id }}" aria-expanded="true" aria-controls="collapse{{ $sale->id }}">unfold_more</i>
                        </div>

                        <div id="collapse{{ $sale->id }}" class="collapse" aria-labelledby="heading{{ $sale->id }}" data-parent="#accordion">
                            <div class="card-body d-flex pb-0">
                                <p class="card-text">kassier: {{ $sale->cashier->username }}</p>
                                <p class="ml-auto">Oude balans: &euro;{{ $sale->old_balance }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($sale->lines as $line)
                                    <li class="list-group-item d-flex pb-0">
                                        <p>{{ $line->product->name }}</p>
                                        <p class="ml-auto">&euro;{{ $line->product->price }}</p>
                                        <p class="ml-auto">&times; {{ $line->amount }}</p>
                                        <p class="ml-auto">&euro;{{ $line->price }}</p>
                                    </li>
                                @endforeach
                                <li class="list-group-item border-success d-flex pb-0">
                                    <p class="ml-auto">Nieuwe balans: &euro;{{ $sale->new_balance }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


