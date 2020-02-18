@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profilePane">
            <h3>Kassa Logs</h3>
            <hr/>

            <table class="adminTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Item</th>
                    <th>Amount</th>
                    <th>Balance</th>
                </tr>
                </thead>

                <tbody>
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
                </tbody>
            </table>
        </div>
    </div>
@endsection


