@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profilePane">
            <h3>Competitions</h3>
            <hr/>
            <a href="{{ route('games.create') }}" class="btn inlineBtn">Create</a>

            <table class="adminTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Start Time</th>
                        <th>Location</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($games as $game)
                        <tr>
                            <td>{{ $game->name }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $game->start_time)->format('H:i') }}</td>
                            <td>{{ $game->location }}</td>
                            <td>
                                <a href="{{ route('games.edit', $game->id) }}" title="Edit"><i class="material-icons">edit</i></a>
                                <form action="{{ route('games.delete', $game->id) }}" method="POST" class="deleteForm">
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