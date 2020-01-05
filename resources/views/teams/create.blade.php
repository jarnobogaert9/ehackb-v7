@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create your team') }}</div>

                    <div class="card-body">
                        <form action="{{ route('teams.store') }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Team Name</label>

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" autofocus required/>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="game" class="col-md-4 col-form-label text-md-right">Game</label>

                                <div class="col-md-6">
                                    <select name="game_id" class="form-control @error('game_id') is-invalid @enderror" id="game" required>
                                        @foreach($games as $game)
                                            <option value="{{ $game->id }}" @if(old('game_id') === $game->id) selected @endif>{{ $game->name }}</option>
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
                                        {{ __('Create') }}
                                    </button>
                                    <a href="{{ route('users.ownProfile') }}" class="btn outlineBtn">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection