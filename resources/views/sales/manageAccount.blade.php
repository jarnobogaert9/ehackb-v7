@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.kassasearchbar')
        @if(isset($user))
            <div>
                <h2 class="color-red">{{ $user->username }}</h2>
                <h5>Balance: {{ '€ ' . $user->balance }}</h5>
                <p></p>
                <a href="{{ route('sales.deposit', $user->id) }}" class="btn outlineBtn">Laad geld op</a>
                <a href="{{ route('sales.order', $user->id) }}" class="btn inlineBtn">Maak een bestelling</a>
            </div>
        @else
            <p>No users found</p>
        @endif
    </div>
@endsection
