@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card-deck">
                    <div class="card">
                        <img src="{{ asset('imgs/games/'.$team->game->thumbnail) }}" class="card-img-top" alt="" title="{{ $team->game->name }}"/>
                        <div class="card-body">
                            <h3 class="card-title">
                                {{ $team->name }}
                                @if(Auth::user()->id == $team->creator->id)
                                    <a href="{{ route('teams.edit', $team->id) }}">
                                        <i class="material-icons">edit</i>
                                    </a>
                                @endif
                            </h3>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                @if(Auth::user()->id == $team->creator->id)
                                    <form action="{{ route('teams.delete', $team->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <input type="submit" value="Delete Your Team" class="btn inlineBtn"/>
                                    </form>
                                @elseif(Auth::user()->teams->contains($team))
                                    <form action="{{ route('teams.removeUser', [$team->id, Auth::user()->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Leave Team" class="btn inlineBtn"/>
                                    </form>
                                @elseif(!Auth::user()->requested_teams->where('team_id', $team->id)->count())
                                    <form action="{{ route('teamrequests.store', $team->id) }}" method="post">
                                        @csrf
                                        <input type="submit" value="Join Team" class="btn outlineBtn"/>
                                    </form>
                                @else
                                    @if(Auth::user()->requested_teams->where('team_id', $team->id)->first()->rejected)
                                        <h6 style="color: red">Request rejected</h6>
                                    @else
                                        <h6 style="color: green">Request pending</h6>
                                        <form action="{{ route('teamrequests.delete', Auth::user()->requested_teams->where('team_id', $team->id)->first()->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Cancel request" class="btn inlineBtn"/>
                                        </form>
                                    @endif
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>

                @if(Auth::user()->id == $team->creator->id)
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Requests</h3>
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php $requests = $team->requests->where('accepted', 0); ?>
                                @if($requests->count() !== 0)
                                    @foreach($requests as $request)
                                        <li class="list-group-item d-flex">
                                            <p class="mb-0">{{ $request->sender->username }}</p>
                                            @if($request->rejected)
                                                <button class="btn outlineBtn disabled ml-auto d-inline-flex">Rejected</button>
                                                <form action="{{ route('teamrequests.delete', $request->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="noBtnStyling" title="Delete request">&times;</button>
                                                </form>
                                            @else
                                                <form class="ml-auto" action="{{ route('teamrequests.accept', $request->id) }}" method="post">
                                                    @csrf
                                                    <button class="btn outlineBtn" type="submit">
                                                        Accept
                                                    </button>
                                                </form>
                                                <form class="d-inline-flex" action="{{ route('teamrequests.reject', $request->id) }}" method="post">
                                                    @csrf
                                                    <button class="btn inlineBtn" type="submit">
                                                        Reject
                                                    </button>
                                                </form>
                                            @endif
                                        </li>
                                    @endforeach
                                @else
                                    <li class="list-group-item">No requests found</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-8">
                <div class="profilePane">
                    <h5>Members ({{ $team->members->count() + 1 }})</h5>
                    <hr class="mb-4"/>

                    <?php $users = $team->members->reverse()->push($team->creator)->reverse()->values(); ?>
                    @foreach($users->chunk(3) as $row)
                        <div class="card-deck">
                            @foreach($row as $index => $member)
                                <a href="{{ route('users.profile', $member->id) }}" class="card profileCard">
                                    <div class="card-img-top">
                                        <img src="{{ asset('imgs/icons/astronaut-user.png') }}" class="card-img-top" alt="">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $member->username }}@if($index === 0) <i class="material-icons">star</i> @endif</h3>
                                        <p class="card-text mb-0">{{ $member->first_name.' '.$member->last_name }}</p>
                                    </div>
                                </a>
                            @endforeach
                            @for($index = $row->count() % 3; $index % 3 !== 0; $index++)
                                <div class="card bg-transparent border-0"></div>
                            @endfor
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection