@extends('layouts.admin')

@section('settingsContent')
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
        <div class="alert alert-danger" role="alert">
            Product succesvol verwijderd.
        </div>
    @endif
    <table class="settingsTable">
        <tr class="thead">
            <th>Name</th>
            <th colspan="2">Actions</th>
        </tr>
        @forelse($products as $index => $product)
            <tr class="settings-tr">
                <td class="first-td">{{ $product->name }}</td>
                <td>
                    <a href="{{route('products.edit', $product->id)}}"><i class="far fa-edit"></i></a>
                </td>
                <td>
                    <form action="{{route('products.delete', $product->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="actionBtn"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        @empty
            <p>There currently are no products...</p>
        @endforelse
        <tr>
            <td>
                <a href="{{route("products.create")}}"><button class="addBtn">Voeg product toe</button></a>
            </td>
        </tr>
    </table>
@endsection


