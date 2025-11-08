@extends('user.layouts.dashboard-master')
@section('panel')
    <div class="user-dashboard-items-wrapper">
        <h3>Money request history</h3>
        <table class="table table-striped">
            <tr>
                <td>Date</td>
                <td>User name</td>
                <td>User email</td>
                <td>Request amount</td>
                <td>Status</td>
                <td>trx</td>
                <td>Reason</td>
            </tr>
            @foreach ($moneyRequests as $moneyRequest)
                <tr>
                    <td>{{ $moneyRequest->created_at }}</td>
                    <td>{{ $moneyRequest->user->name ?? '' }}</td>
                    <td>{{ $moneyRequest->user->email ?? '' }}</td>
                    <td>{{ $moneyRequest->amount }}</td>
                    <td>
                        @if ($moneyRequest->status == 0)
                            <span class="badge bg-warning">Pending</span>
                        @elseif($moneyRequest->status == 1)
                           <span class="badge bg-primary">Accepted</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>
                    <td>{{ $moneyRequest->trx }}</td>
                    <td>
                        @if($moneyRequest->status == 2)
                        {{ $moneyRequest->reason }}
                        @else
                        N/A
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
