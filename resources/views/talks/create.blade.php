@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Talk') }}</div>

                    <div class="card-body">
                        <form action="{{ route('talks.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" autofocus required/>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="speaker" class="col-md-4 col-form-label text-md-right">Speaker</label>

                                <div class="col-md-6">
                                    <input type="text" name="speaker" class="form-control @error('speaker') is-invalid @enderror" value="{{ old('speaker') }}" id="speaker" required/>
                                    @error('speaker')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="startTime" class="col-md-4 col-form-label text-md-right">Start Time</label>

                                <div class="col-md-6">
                                    <input type="time" name="start_time" step="1" class="form-control @error('start_time') is-invalid @enderror" value="{{ old('start_time') }}" id="startTime" required/>
                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="endTime" class="col-md-4 col-form-label text-md-right">End Time</label>

                                <div class="col-md-6">
                                    <input type="time" name="end_time" step="1" class="form-control @error('end_time') is-invalid @enderror" value="{{ old('end_time') }}" id="endTime" required/>
                                    @error('end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="places" class="col-md-4 col-form-label text-md-right">Max Places</label>

                                <div class="col-md-6">
                                    <input type="number" name="max_places" class="form-control @error('max_places') is-invalid @enderror" value="{{ old('max_places') }}" id="places" required/>
                                    @error('max_places')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="excerpt" class="col-md-4 col-form-label text-md-right">Excerpt</label>

                                <div class="col-md-6">
                                    <textarea name="excerpt" class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" cols="30" rows="10" required>{{ old('excerpt') }}</textarea>
                                    @error('excerpt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="body" class="col-md-4 col-form-label text-md-right">Body</label>

                                <div class="col-md-6">
                                    <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body" cols="30" rows="10" required>{{ old('body') }}</textarea>
                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">Photo</label>

                                <div class="col-md-6">
                                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo" required/>
                                    @error('photo')
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
                                    <a href="{{ route('adminpanel.talks') }}" class="btn outlineBtn">
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