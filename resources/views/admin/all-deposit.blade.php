@extends('admin.layouts.master')
@section('content')
    <div class="user-wrapper">
        <h3 class="mb-3">
            All Deposits
        </h3>
        <table class="table table-striped">
            <tr>
                <td>Date</td>
                <td>User name</td>
                <td>User email</td>
                <td>Amount</td>
                <td>Status</td>
                <td>Document</td>
                <td>trx</td>
            </tr>
            @foreach ($allDeposits as $deposit)
                <tr>
                    <td>{{ $deposit->created_at }}</td>
                    <td>{{ $deposit->user->name }}</td>
                    <td>{{ $deposit->user->email }}</td>
                    <td>{{ $deposit->amount }}</td>
                    <td>
                        @if ($deposit->status == 0)
                            <span class="badge bg-warning">Pending</span>
                        @elseif($deposit->status == 1)
                            <span class="badge bg-primary">Accepted</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>
                     <td class="popup-gallery">
                        <a href="{{ asset($deposit->document) }}">
                            <img src="{{ asset($deposit->document) }}" alt="" class="custom-img_admin">
                        </a>
                    </td>
                    <td>{{ $deposit->trx }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
