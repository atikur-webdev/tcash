@extends('user.layouts.dashboard-master')
@section('panel')
    <div class="user-dashboard-items-wrapper">
        <h3>Send Money</h3>
        <form action="{{ route('user.send.money') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control" name="send_money_email" placeholder="Enter email">
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" name="amount" placeholder="Enter your amount">
            </div>
             <div class="mb-3">
                <input type="text" class="form-control" name="remarks" placeholder="Optional comments">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Send Money</button>
            </div>
        </form>
    </div>
@endsection
