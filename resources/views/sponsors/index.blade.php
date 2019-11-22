@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($sponsors as $index => $sponsor)
                @if($index-1 % 3 == 0 && $index-1 != 0)
                    </div>
                    <div class="row">
                @endif
                <a href="{{ $sponsor->url }}" class="col-md-{{ 5-$sponsor->tier }}">
                    <img src="{{ asset('imgs/sponsors/'.$sponsor->logo) }}" alt="" title="{{ $sponsor->name }}"/>
                </a>
            @endforeach
        </div>
    </div>
@endsection