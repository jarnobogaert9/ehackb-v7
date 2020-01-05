@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit ')." ".$team->name }}</div>

                    <div class="card-body">
                        <form action="{{ route('teams.update', $team->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ (old('name') !== null) ? old('name') : $team->name }}" id="name" autofocus required/>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="leader" class="col-md-4 col-form-label text-md-right">Team Leader</label>

                                <div class="col-md-6">
                                    <input type="text" name="leader" class="form-control" value="{{ $team->creator->username }}" id="leader" readonly/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="game" class="col-md-4 col-form-label text-md-right">Game</label>

                                <div class="col-md-6">
                                    <select name="game_id" class="form-control @error('game_id') is-invalid @enderror" id="game" required>
                                        @foreach($games as $game)
                                            <option value="{{ $game->id }}" @if($team->game->id === $game->id) selected @endif>{{ $game->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('game_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    <a href=" @if(Auth::user()->is_admin) {{ route('adminpanel.teams') }} @else {{ route('teams.one', $team->id) }} @endif " class="btn outlineBtn">
                                        {{ __('Back') }}
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="members" class="col-md-4 col-form-label text-md-right">Members</label>

                            <div class="col-md-6">
                                <ul class="form-control">
                                    @foreach($team->members as $member)
                                        <li>
                                            <span class="mr-auto">{{ $member->username }}</span>
                                            <form action="{{ route('teams.removeUser', [$team->id, $member->id]) }}" method="post" class="deleteForm">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="ml-auto">
                                                    <i class="material-icons" title="remove">remove</i>
                                                </button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection