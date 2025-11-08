@extends('admin.layouts.master')
@section('content')
    <div class="user-wrapper">
        <h3 class="mb-3">Rejected Withdraws</h3>
        <table class="table table-striped">
            <tr>
                <td>Date</td>
                <td>Amount</td>
                <td>Transaction Number</td>
                <td>Status</td>
                <td>trx</td>
            </tr>
            @foreach ($rejectWithdraws as $request)
                <tr>
                    <td>{{ $request->created_at }}</td>
                    <td>{{ $request->amount }}</td>
                    <td>{{ $request->transaction_number }}</td>
                    <td>
                        @if ($request->status == 2)
                            <span class="badge bg-warning">Rejected</span>
                        @endif
                    </td>
                    <td>{{ $request->trx }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
