@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="{{ asset('imgs/talks/'.$talk->photo) }}" alt="" title="{{ $talk->title }}"/>
        <h3>{{ $talk->title }}</h3>
        <p>{{ $talk->available_places }}/{{ $talk->max_places }} places available</p>
        <p>{{ $talk->start_time }} - {{ $talk->end_time }} | {{ $talk->speaker }}</p>
        <p>{{ $talk->excerpt }}</p>
        <p>{{ $talk->body }}</p>
        <form action="{{ route('talks.delete', $talk->id) }}" method="post">
            @csrf
            @method('DELETE')

            <input type="submit" value="Delete talk"/>
        </form>
    </div>
@endsection