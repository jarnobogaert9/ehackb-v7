@extends('layouts.admin')

@section('settingsContent')

    <form method="POST" action="{{route('products.store')}}" class="settingsForm" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger alert-error">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                    <br>
                @endforeach
            </div>
        @endif

        <h2>Create a product</h2>
        <hr>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                   placeholder="Eg. Hot dog" value="{{old('name')}}" required>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control-file" id="photo" value="{{old('photo')}}" name="photo" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" step="any"
                       placeholder="Eg. 4.50" name="price" value="{{old('price')}}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity"
                       placeholder="Eg. 250" name="quantity" value="{{old('quantity')}}">
                <small>Not required</small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

