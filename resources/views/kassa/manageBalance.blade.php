@extends('admin.kassa')

@section('manageBalance')

    @if(isset($user))
        <div class="balanceContent">
            <h1 class="balance-h1">{{$user->username}}</h1>
            <div class="row balance-row">
                <div class="col-4">
                    <div class="balanceBox">
                        <h2 class="balance-h2">Balance</h2>
                        <p class="balance-p">{{'€ ' . $user->balance}}</p>
                    </div>
                </div>
                <div class="col-4">
                    <form action="{{route('kassa.update', $user->id)}}" method="post" class="balance-form">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="amount">Voeg geld toe</label>
                            <input type="number" step="any" class="form-control" id="amount" name="amount"
                                   placeholder="Selecteer een bedrag" value="{{old('amount')}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">€€€</button>
                    </form>
                </div>
            </div>
            <a href="{{route('kassa.order', $user->id)}}">
                <button type="submit" class="btn btn-primary" id="maakBestelling">Maak een bestelling</button>
            </a>
            @if(!empty($info))
                <div class="row balance-row">
                    <div class="col-6">
                        <div class="alert alert-success bestelling-succes" role="alert">
                            {{$user->username . " heeft " . $info["amount"] . "x " . $info["name"] . " besteld voor €" . $info["price"]}}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @else
        <p>No users found</p>
    @endif
@endsection
