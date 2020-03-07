@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card-deck">
                    <div class="card">
                        <img src="{{ asset('storage/'.$talk->photo) }}" class="card-img-top" alt="" title="{{ $talk->title }}"/>
                        <div class="card-body">
                            <h3 class="card-title">{{ $talk->title }}</h3>
                            <p class="card-text mb-0">{{ $talk->speaker }}</p>
                            <p class="card-text">{{ \Carbon\Carbon::createFromFormat('H:i:s', $talk->start_time)->format('H:i') }} - {{ Carbon\Carbon::createFromFormat('H:i:s', $talk->end_time)->format('H:i') }}</p>
                        </div>

                        <ul class="list-group list-group-flush">
{{--                            <li class="list-group-item border-success">{{ $talk->available_places }}/{{ $talk->max_places }} places available</li>--}}
                            <li class="list-group-item bg-@if($talk->available_places === 0){{"danger text-white"}} @elseif($talk->available_places <= 5){{"warning text-black"}} @else{{"success text-white"}}@endif">{{ $talk->available_places }}/{{ $talk->max_places }} places available</li>
                            <li class="list-group-item">
                                @auth
                                    @if(Auth::user()->subscribed_talks->contains($talk))
                                        <form action="{{ route('talks.remove', $talk->id) }}" method="POST">
                                            @csrf
                                            <input type="submit" value="Decline Attendance" class="btn inlineBtn"/>
                                        </form>
                                    @else
                                        <form action="{{ route('talks.add', $talk->id) }}" method="POST">
                                            @csrf
                                            <input type="submit" value="Attend Talk" class="btn outlineBtn"/>
                                        </form>
                                    @endif
                                @endauth
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="profilePane">
                    <p>{{ $talk->excerpt }}</p>
                    <p>{{ $talk->body }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection