@extends('user.layouts.dashboard-master')
@section('panel')
    <div class="user-dashboard-items-wrapper">
        <h3>Deposit history</h3>
        <table class="table table-striped">
            <tr>
                <td>User id</td>
                <td>User name</td>
                <td>User email</td>
                <td>Request amount</td>
                <td>Status</td>
                <td>trx</td>
            </tr>
            @foreach ($deposits as $deposit)
                <tr>
                    <td>{{ $deposit->user->id }}</td>
                    <td>{{ $deposit->user->name }}</td>
                    <td>{{ $deposit->user->email }}</td>
                    <td>{{ $deposit->amount }}</td>
                    <td>
                        @if ($deposit->status == 0)
                            <span class="badge bg-warning">Pending</span>
                        @elseif($deposit->status == 1)
                           <span class="badge bg-primary">Accepted</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>
                    <td>{{ $deposit->trx }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
