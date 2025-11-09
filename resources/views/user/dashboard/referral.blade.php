@extends('user.layouts.dashboard-master')
@section('panel')
<div class="referral" style="margin-top: 40px">
<div class="card">
    <h5 class="card-header">Referral code</h5>
    <div class="card-body">
        <h5 class="card-title">Your unique referral code</h5>
        <p class="card-text">You will get bonus for each refer</p>
        <span>Your referral link -><strong>http://127.0.0.1/projects/tCash/register?referral={{ $user->referral_link }}</strong></span>
    </div>
</div>
</div>
@endsection
