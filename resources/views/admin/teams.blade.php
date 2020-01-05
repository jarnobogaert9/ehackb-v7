@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profilePane">
            <h3>Teams</h3>
            <hr/>

            <table class="adminTable">
                <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Team Leader</th>
                    <th>Game</th>
                    <th>Members</th>
                </tr>
                </thead>

                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td class="starIcon" title="Your team">@if($team->creator->id === Auth::user()->id)<i class="material-icons">star</i>@endif</td>
                        <td>{{ $team->name }}</td>
                        <td><a href="{{ route('users.profile', $team->creator->id) }}">{{ $team->creator->username }}</a></td>
                        <td>{{ $team->game->name }}</td>
                        <td>{{ $team->members->count() + 1 }}<i class="material-icons"  title="show">expand_more</i></td>

                        <td>
                            <a href="{{ route('teams.edit', $team->id) }}" title="edit"><i class="material-icons">edit</i></a>
                            <form action="{{ route('teams.delete', $team->id) }}" method="POST" class="deleteForm">
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