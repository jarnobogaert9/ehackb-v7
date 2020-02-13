@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profilePane">
            <h3>Users</h3>
            <hr/>

            <table class="adminTable">
                <thead>
                <tr>
                    <th></th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="starIcon" title="admin">@if($user->role == 2)<i class="material-icons">star</i>@endif</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>

                        <td>
                            @if($user->id !== Auth::user()->id)
                                <a href="{{ route('users.toggleAdmin', $user->id) }}" title="@if($user->role == 2) Remove @else Set @endif admin"><i class="material-icons">star_half</i></a>
                                <form action="{{ route('users.delete', $user->id) }}" method="POST" class="deleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete"><i class="material-icons">delete</i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection