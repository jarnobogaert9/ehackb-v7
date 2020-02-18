@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Product') }}</div>

                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

{{--                            @if ($errors->any())--}}
{{--                                <div class="alert alert-danger alert-error">--}}
{{--                                    @foreach ($errors->all() as $error)--}}
{{--                                        {{ $error }}--}}
{{--                                        <br>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            @endif--}}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="name"
                                           placeholder="Eg. Hot dog" value="{{ old('name') }}" required/>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">Photo</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" value="{{ old('photo') }}" name="photo" required>
                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" step="any"
                                           placeholder="Eg. 4.50" name="price" value="{{ old('price') }}" required>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantity</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                           placeholder="Eg. 250" name="quantity" value="{{ old('quantity') }}">
                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small>Not required</small>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                    <a href="{{ route('adminpanel.products') }}" class="btn outlineBtn">
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

