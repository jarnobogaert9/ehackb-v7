@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profilePane">
                    <h3>{{ $nieuws->title }}</h3>
                    <p>{{ $nieuws->body }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection