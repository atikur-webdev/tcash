@extends('admin.layouts.master')
@section('content')
    <div class="user-wrapper">
        <h3 class="mb-3">Successful Withdraws</h3>
        <table class="table table-striped">
            <tr>
                <td>User Id</td>
                <td>Amount</td>
                <td>Transaction Number</td>
                <td>Status</td>
                <td>trx</td>
            </tr>
            @foreach ($successWithdraws as $request)
                <tr>
                    <td>{{ $request->user->id }}</td>
                    <td>{{ $request->amount }}</td>
                    <td>{{ $request->transaction_number }}</td>
                    <td>
                        @if ($request->status == 1)
                            <span class="badge bg-primary">Success</span>
                        @endif
                    </td>
                    <td>{{ $request->trx }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
