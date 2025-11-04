@extends('user.layouts.dashboard-master')

@section('panel')
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
        </tr>
       @foreach ($transactionItems as $item)
           <tr>
            <td>{{ $item->user_id }}</td>
            <td>{{ $item->amount }}</td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->post_balance }}</td>
            <td>{{ $item->details }}</td>
            <td>{{ $item->trx }}</td>
           </tr>
       @endforeach 
    </table>
@endsection
