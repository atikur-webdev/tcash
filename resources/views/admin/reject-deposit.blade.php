@extends('admin.layouts.master')
@section('content')
<div class="user-wrapper">
    <h3 class="mb-3">Rejected Deposits</h3>
    <table class="table table-striped">
        <tr>
            <td>User id</td>
            <td>User name</td>
            <td>User email</td>
            <td>Request amount</td>
            <td>Status</td>
            <td>trx</td>
        </tr>
        @foreach ($rejectDeposits as $request)
            <tr>
                <td>{{ $request->user->id }}</td>
                <td>{{ $request->user->name }}</td>
                <td>{{ $request->user->email }}</td>
                <td>{{ $request->amount }}</td>
                <td>
                    @if($request->status == 2) 
                    <span class="badge bg-warning">Rejected</span>
                    @endif
                <td>{{ $request->trx }}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection