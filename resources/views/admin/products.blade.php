@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('saved'))
            <div class="alert alert-success" role="alert">
                Product succesvol opgeslagen.
            </div>
        @endif
        @if(session()->has('updated'))
            <div class="alert alert-info" role="alert">
                Product succesvol geüpdate.
            </div>
        @endif
        @if(session()->has('deleted'))
            <div class="alert alert-info" role="alert">
                Product succesvol verwijderd.
            </div>
        @endif

        <div class="profilePane">
            <h3>Products</h3>
            <hr/>

            <a href="{{route("products.create")}}" class="btn inlineBtn">Create</a>

            <table class="adminTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $index => $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>
                                <a href="{{route('products.edit', $product->id)}}" title="Edit"><i class="material-icons">edit</i></a>
                                <form action="{{route('products.delete', $product->id)}}" method="POST" class="deleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p>There currently are no products...</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection


