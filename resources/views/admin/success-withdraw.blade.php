@extends('admin.layouts.master')
@section('content')
    <div class="user-wrapper">
        <h3 class="mb-3">Successful Withdraws</h3>
        <table class="table table-striped">
            <tr>
                <td>Date</td>
                <td>Amount</td>
                <td>Charge</td>
                <td>Total paid</td>
                <td>Transaction Number</td>
                <td>Status</td>
                <td>trx</td>
            </tr>
            @foreach ($successWithdraws as $request)
                <tr>
                    <td>{{ $request->created_at }}</td>
                    <td>{{ siteCurrency()->cur_sym }}{{ $request->amount }}</td>
                    <td>{{ siteCurrency()->cur_sym }}{{ $request->charge }}</td>
                    <td>{{ siteCurrency()->cur_sym }}{{ $request->payable }}</td>
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
