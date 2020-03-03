@extends('layouts.app')

@section('content')
    <?php $isSuperAdmin = false; ?>
    @if(Auth::user()->role == 3)
        <?php $isSuperAdmin = true; ?>
    @endif
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
                        <td class="starIcon">
                            @if($user->role == 1)
                                <i class="material-icons" title="kassabeheerder">shopping_cart</i>
                            @elseif($user->role == 2)
                                <i class="material-icons" title="admin">star</i>
                            @endif
                        </td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>

{{--                        TODO: Maak deftige layout en UI voor maken/verwijderen van admins & kassabeheerders. --}}
{{--                        TODO:   -xoxo Den Beirend --}}

                        <td>
                            @if($user->id !== Auth::user()->id)
                                @if($isSuperAdmin)
                                    <a href="{{ route('users.toggleAdmin', $user->id) }}" title="@if($user->role == 2) Remove @else Maak @endif admin"><i class="material-icons">star_half</i></a>
                                    <a href="{{ route('users.toggleCashier', $user->id) }}" title="@if($user->role == 1) Remove @else Maak @endif kassabeheerder"><i class="material-icons">shopping_cart</i></a>
                                @endif

                                @if(Auth::user()->role == 3 || (Auth::user()->role == 2 && $user->role == 0))
                                    <form action="{{ route('users.delete', $user->id) }}" method="POST" class="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Delete"><i class="material-icons">delete</i></button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection