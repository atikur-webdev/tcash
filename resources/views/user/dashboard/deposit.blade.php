@extends('user.layouts.dashboard-master')
@section('panel')
    <div class="user-dashboard-items-wrapper">
        <h3>Deposit Money Request</h3>
        <form action="{{ route('user.send.deposit.request') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="number" class="form-control" name="deposit_amount" placeholder="Enter your amount">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Send Request</button>
            </div>
        </form>
    </div>
@endsection
