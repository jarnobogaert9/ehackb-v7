@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profilePane">
            <h3>Nieuws</h3>
            <hr/>
            <a href="{{ route('nieuws.create') }}" class="btn inlineBtn">Create</a>

            <table class="adminTable">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Created at</th>
                </tr>
                </thead>

                <tbody>
                @foreach($nieuws as $nieuwtje)
                    <tr>
                        <td>{{ $nieuwtje->title }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $nieuwtje->created_at)->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('nieuws.edit', $nieuwtje->id) }}" title="Edit"><i class="material-icons">edit</i></a>
                            <form action="{{ route('nieuws.delete', $nieuwtje->id) }}" method="POST" class="deleteForm">
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