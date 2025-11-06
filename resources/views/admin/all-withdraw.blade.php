@extends('admin.layouts.master')
@section('content')
    <div class="user-wrapper">
        <h3 class="mb-3">All Withdraws</h3>
        <table class="table table-striped">
            <tr>
                <td>User id</td>
                <td>Amount</td>
                <td>Transaction Number</td>
                <td>Status</td>
                <td>trx</td>
            </tr>
            @foreach ($allWithdraws as $withdraw)
                <tr>
                    <td>{{ $withdraw->user_id }}</td>
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
