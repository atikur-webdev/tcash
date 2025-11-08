@extends('user.layouts.dashboard-master')
@section('panel')
    <div class="user-dashboard-items-wrapper">
        <h3>Deposit Money Request</h3>
        <p class="mt-3">
            Please Send Money To This Account <span class="fw-bold">01234567888</span>
        </p>
        <form action="{{ route('user.send.deposit.request') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="deposit_amount" placeholder="Enter your amount">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">{{ siteCurrency()->cur_text }}</span>
                </div>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="document">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Send Request</button>
            </div>
        </form>
    </div>
@endsection
