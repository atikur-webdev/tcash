@extends('user.layouts.dashboard-master')

@section('panel')
<div class="user-dashboard-items-wrapper">
<h3>Transaction History</h3>
    <table class="table table-striped transaction-table">
        <tr>
            <td>
                User_id
            </td>
            <td>Amount</td>
            <td>Type</td>
            <td>Post_Balance</td>
            <td>Details</td>
            <td>trx</td>
            <td>Remarks</td>
        </tr>
       @foreach ($transactionItems as $item)
           <tr>
            <td>{{ $item->user_id }}</td>
            <td>{{ $item->amount }}</td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->post_balance }}</td>
            <td>{{ $item->details }}</td>
            <td>{{ $item->trx }}</td>
            <td>{{ $item->remarks }}</td>
           </tr>
       @endforeach 
    </table>
    </div>
@endsection
