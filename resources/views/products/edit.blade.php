@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit '.$product->name) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('products.update', $product->id)}}" class="settingsForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="alert alert-danger alert-error">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                    <br>
                                @endforeach
                            </div>
                        @endif

                        <h2>Edit a product</h2>
                        <hr>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="name"
                                       placeholder="Eg. Hot dog" value="{{ $product->name }}" required/>
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
                                <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" value="{{ $product->photo }}" name="photo"/>
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Current photo</label>

                            <div class="col-md-6">
                                <img src="{{ asset('imgs/products/'. $product->photo) }}" alt="" class="col-md-4"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" step="any"
                                   placeholder="Eg. 4.50" name="price" value="{{$product->price}}" required/>
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
                                       placeholder="Eg. 250" name="quantity" value="{{$product->quantity}}"/>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small>Not required</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sold" class="col-md-4 col-form-label text-md-right">Numbers sold</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control @error('sold') is-invalid @enderror" id="sold"
                                       placeholder="Eg. 45" name="sold" value="{{$product->sold}}"/>
                                @error('sold')
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

