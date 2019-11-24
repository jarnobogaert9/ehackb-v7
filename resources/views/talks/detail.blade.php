@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="{{ asset('imgs/talks/'.$talk->photo) }}" alt="" title="{{ $talk->title }}"/>
        <h3>{{ $talk->title }}</h3>
        <p>{{ $talk->available_places }}/{{ $talk->max_places }} places available</p>
        <p>{{ $talk->start_time }} - {{ $talk->end_time }} | {{ $talk->speaker }}</p>
        <p>{{ $talk->excerpt }}</p>
        <p>{{ $talk->body }}</p>

        @auth
            @if(Auth::user()->subscribed_talks->contains($talk))
                <form action="{{ route('talks.remove', $talk->id) }}" method="POST">
                    @csrf
                    <input type="submit" value="&checkmark; Talk Added" class="btn inlineBtn"/>
                </form>
            @else
                <form action="{{ route('talks.add', $talk->id) }}" method="POST">
                    @csrf
                    <input type="submit" value="Add Talk" class="btn outlineBtn"/>
                </form>
            @endif
            @if(Auth::user()->is_admin == 1)
            <form action="{{ route('talks.delete', $talk->id) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Delete talk" class="btn inlineBtn"/>
            </form>
            @endif
        @endauth
    </div>
@endsection