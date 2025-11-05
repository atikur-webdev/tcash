@extends('admin.layouts.master')
@section('content')
    <div class="user-wrapper">
        <h3 class="mb-3">Successful Deposits</h3>
        <table class="table table-striped">
        <tr>
            <td>User Id</td>
            <td>User name</td>
            <td>User email</td>
            <td>Request amount</td>
            <td>Status</td>
            <td>trx</td>
        </tr>
        @foreach ($successDeposits as $request)
            <tr>
                <td>{{ $request->user->id }}</td>
                <td>{{ $request->user->name }}</td>
                <td>{{ $request->user->email }}</td>
                <td>{{ $request->amount }}</td>
                <td>
                    @if($request->status == 1)
                    <span class="badge bg-primary">Success</span>
                    @endif
                </td>
                <td>{{ $request->trx }}</td>
            </tr>
        @endforeach
        </table>
    </div>
@endsection
