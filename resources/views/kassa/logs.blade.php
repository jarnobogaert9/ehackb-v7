@extends('layouts.admin')

@section('settingsContent')
    <table class="settingsTable">
        <tr class="thead">
            <th>#</th>
            <th>User</th>
            <th>Item</th>
            <th>Amount</th>
            <th>Balance</th>
        </tr>
        @forelse($logs as $index => $log)
            <tr class="settings-tr logsTable">
                <td>{{ $log->id }}</td>
                <td>{{ $log->user->first_name . " " . $log->user->last_name}}</td>
                <td>{{ $log->product->name}}</td>
                <td {{ $log->amount < 0 ? "class=red" : "" }}><b>€</b> {{ $log->amount }}</td>
                <td><b>€</b> {{ $log->balance }}</td>
            </tr>
        @empty
            <p>There currently are no logs...</p>
        @endforelse
    </table>
@endsection


