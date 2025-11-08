@extends('user.layouts.dashboard-master')

@section('panel')
    <div class="user-dashboard-items-wrapper">
        <h3 class="mb-3">Withdraws History</h3>
        <table class="table table-striped">
            <tr>
                <td>Date</td>
                <td>Amount</td>
                <td>Transaction Number</td>
                <td>Status</td>
                <td>trx</td>
            </tr>
            @foreach ($withdraws as $withdraw)
                <tr>
                    <td>{{ $withdraw->created_at }}</td>
                    <td>{{ $withdraw->amount }}</td>
                    <td>{{ $withdraw->transaction_number }}</td>
                    <td>
                        @if ($withdraw->status == 0)
                            <span class="badge bg-warning">Pending</span>
                        @elseif($withdraw->status == 1)
                            <span class="badge bg-primary">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>
                    <td>{{ $withdraw->trx }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
