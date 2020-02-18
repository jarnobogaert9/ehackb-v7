@extends('layouts.app')

@section('content')
<div class="container">
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
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                   placeholder="Eg. Hot dog" value="{{$product->name}}" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="photo">Photo</label>
                <input type="file" class="form-control-file" id="photo" value="{{$product->photo}}" name="photo">
            </div>
            <div class="form-group col-md-6">
                <figure class="oldPhoto">
                    <img src="{{asset('images/producten/'. $product->photo)}}" alt="">
                    <figcaption>Current photo</figcaption>
                </figure>
            </div>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" step="any"
                   placeholder="Eg. 4.50" name="price" value="{{$product->price}}" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity"
                       placeholder="Eg. 250" name="quantity" value="{{$product->quantity}}">
                <small>Not required</small>
            </div>
            <div class="form-group col-md-6">
                <label for="sold">Numbers sold</label>
                <input type="number" class="form-control" id="sold"
                       placeholder="Eg. 45" name="sold" value="{{$product->sold}}">
                <small>Not required</small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

