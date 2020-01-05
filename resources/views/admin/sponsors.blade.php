@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profilePane">
            <h3>Sponsors</h3>
            <hr/>
            <a href="{{ route('sponsors.create') }}" class="btn inlineBtn">Create</a>

            <table class="adminTable">
                <thead>
                <tr>
                    <th>Tier</th>
                    <th>Name</th>
                    <th>URL</th>
                </tr>
                </thead>

                <tbody>
                @foreach($sponsors as $sponsor)
                    <tr>
                        <td>{{ $sponsor->tier }}</td>
                        <td>{{ $sponsor->name }}</td>
                        <td>{{ $sponsor->url }}</td>

                        <td>
                            <a href="{{ route('sponsors.edit', $sponsor->id) }}" title="edit"><i class="material-icons">edit</i></a>
                            <form action="{{ route('sponsors.delete', $sponsor->id) }}" method="POST" class="deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection