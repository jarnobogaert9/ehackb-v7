@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Geld opladen voor {{$user->username}}</h1>
        <div class="row">
            <div class="col-md-9">
                <div class="card-columns">
                    <div class="card" id="5">
                        <div class="card-body">
                            <h3 class="card-title">&euro; 5</h3>
                        </div>
                    </div>
                    <div class="card" id="10">
                        <div class="card-body">
                            <h3 class="card-title">&euro; 10</h3>
                        </div>
                    </div>
                    <div class="card" id="20">
                        <div class="card-body">
                            <h3 class="card-title">&euro; 20</h3>
                        </div>
                    </div>
                    <div class="card" id="50">
                        <div class="card-body">
                            <h3 class="card-title">&euro; 50</h3>
                        </div>
                    </div>
                </div>

                <div class="row ml-0 mr-0">
                    <form action="{{ route('sales.storeMoney', $user->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="amount" value="0" id="input"/>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Bevestig') }}
                        </button>
                    </form>

                    <a href="{{ route('sales.manageAccount', $user->id) }}" class="btn outlineBtn ml-1">
                        {{ __('Annuleer') }}
                    </a>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card" id="amountToDeposit">
                    <div class="card-body">
                        <h5 class="card-title">Totaal: &euro;<span>0</span></h5>
                    </div>
                    <ul class="list-group list-group-flush" id="history"></ul>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/depositMoney.js') }}"></script>
@endsection
