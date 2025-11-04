@extends('user.layouts.dashboard-master')
@section('panel')
<div class="send-money-history">
    <h3>Send Money History</h3>
    <table class="table table-striped">
        <tr>
            <td>Amount</td>
            <td>Post_balance</td>
        </tr>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->post_balance }}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection