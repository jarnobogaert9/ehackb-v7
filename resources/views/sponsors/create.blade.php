@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Sponsor') }}</div>

                    <div class="card-body">
                        <form action="{{ route('sponsors.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

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
                                <label for="tier" class="col-md-4 col-form-label text-md-right">Tier</label>

                                <div class="col-md-6">
                                    <select name="tier" class="form-control @error('tier') is-invalid @enderror" id="tier" required>
                                        <option value="1" {{ (old('tier') == 1) ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ (old('tier') == 2) ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ (old('tier') == 3) ? 'selected' : '' }}>3</option>
                                    </select>
                                    @error('tier')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">URL</label>

                                <div class="col-md-6">
                                    <input type="url" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}" id="url" required/>
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="logo" class="col-md-4 col-form-label text-md-right">Logo</label>

                                <div class="col-md-6">
                                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="logo"/>
                                    @error('logo')
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
                                    <a href="{{ route('adminpanel.sponsors') }}" class="btn outlineBtn">
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