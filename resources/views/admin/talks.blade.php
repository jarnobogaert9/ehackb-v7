@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profilePane">
            <h3>Talks</h3>
            <hr/>
            <a href="{{ route('talks.create') }}" class="btn inlineBtn">Create</a>

            <table class="adminTable">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Speaker</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Available Places</th>
                </tr>
                </thead>

                <tbody>
                @foreach($talks as $talk)
                    <tr>
                        <td>{{ $talk->title }}</td>
                        <td>{{ $talk->speaker }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $talk->start_time)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $talk->end_time)->format('H:i') }}</td>
                        <td>{{ $talk->available_places."/".$talk->max_places }}</td>
                        <td>
                            <a href="{{ route('talks.edit', $talk->id) }}" title="Edit"><i class="material-icons">edit</i></a>
                            <form action="{{ route('talks.delete', $talk->id) }}" method="POST" class="deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection