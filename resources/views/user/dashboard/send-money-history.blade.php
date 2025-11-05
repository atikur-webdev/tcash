@extends('user.layouts.dashboard-master')
@section('panel')
<div class="user-dashboard-items-wrapper">
    <h3>Send Money History</h3>
    <table class="table table-striped">
        <tr>
            <td>Date</td>
            <td>Receiver</td>
            <td>Amount</td>
            <td>Post_balance</td>
            <td>Remarks</td>
            <td>trx</td>
        </tr>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->created_at }}</td>
                <td>{{ $transaction->details }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->post_balance }}</td>
                <td>{{ $transaction->remarks }}</td>
                <td>{{ $transaction->trx }}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection