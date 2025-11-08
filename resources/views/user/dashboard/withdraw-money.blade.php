@extends('user.layouts.dashboard-master')

@section('panel')
    <div class="user-dashboard-items-wrapper">
        <h3>Withdraw Money</h3>
        <form action="{{ route('user.withdraw.now') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="amount" placeholder="Enter your amount">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">{{ siteCurrency()->cur_text }}</span>
                </div>
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" name="transaction_number"
                    placeholder="Enter your account number">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Withdraw Money</button>
            </div>
        </form>
    </div>
@endsection
