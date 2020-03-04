@extends('kassa.index')

@section('manageBalance')

    @if(isset($user))
        <div class="balanceContent">
            <h1 class="balance-h1">{{ $user->username }}</h1>
            <div class="row balance-row">
                <div class="col-4">
                    <div class="balanceBox">
                        <h2 class="balance-h2">Balance</h2>
                        <p class="balance-p">{{ '€ ' . $user->balance }}</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('kassa.deposit', $user->id) }}">
                <button type="submit" class="btn btn-primary">Laad geld op</button>
            </a>
            <a href="{{ route('kassa.order', $user->id) }}">
                <button type="submit" class="btn btn-primary">Maak een bestelling</button>
            </a>

            @if(!empty($info))
                <div class="row balance-row">
                    <div class="col-6">
                        <div class="alert alert-success bestelling-succes" role="alert">
                            {{ $user->username . " heeft " . $info["amount"] . "x " . $info["name"] . " besteld voor €" . $info["price"] }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @else
        <p>No users found</p>
    @endif
@endsection
