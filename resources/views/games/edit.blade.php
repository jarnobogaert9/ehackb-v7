@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit') }} {{ $game->name }}</div>

                    <div class="card-body">
                        <form action="{{ route('games.update', $game->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') !== null ? old('name') : $game->name }}" id="name" required autofocus/>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">New Thumbnail</label>

                                <div class="col-md-6">
                                    <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" id="photo"/>
                                    @error('thumbnail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="time" class="col-md-4 col-form-label text-md-right">Start Time</label>

                                <div class="col-md-6">
                                    <input type="time" name="start_time" step="1" class="form-control @error('start_time') is-invalid @enderror" value="{{ old('start_time') !== null ? old('start_time') : \Carbon\Carbon::createFromFormat('H:i:s', $game->start_time)->format('H:i:s') }}" id="time" required/>
                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="loc" class="col-md-4 col-form-label text-md-right">Location</label>

                                <div class="col-md-6">
                                    <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') !== null ? old('location') : $game->location }}" id="loc" required/>
                                    @error('location')
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
                                    <a href="{{ route('adminpanel.games') }}" class="btn outlineBtn">
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