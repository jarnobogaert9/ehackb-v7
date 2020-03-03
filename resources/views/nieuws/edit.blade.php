@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Nieuws') }}</div>

                    <div class="card-body">
                        <form action="{{ route('nieuws.update', $nieuws->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ (old('title') !== null) ? old('title') : $nieuws->title }}" id="title" autofocus required/>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="body" class="col-md-4 col-form-label text-md-right">Body</label>

                                <div class="col-md-6">
                                    <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body" cols="30" rows="10" required>{{ (old('body') !== null) ? old('body') : $nieuws->body }}</textarea>
                                    @error('body')
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
                                    <a href="{{ route('adminpanel.nieuws') }}" class="btn outlineBtn">
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