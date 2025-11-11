@extends('user.layouts.dashboard-master')
@section('panel')
    <div class="dps-plans" style="display: flex; gap:10px; align-item:center; justify-content:center; margin-top: 50px;">
        @foreach ($dps as $dpsPlan)
            <div class="card" style="width: 18rem; margin-top:40px;">
                <div class="card-header bg-primary">
                    <span class="fs-2 text-light"><strong>{{ $dpsPlan->name }}</strong></span>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <span>Installment Interval</span>
                        <span>{{ $dpsPlan->installment_interval }}days</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <span>Total Installment</span>
                        <span>{{ siteCurrency()->cur_sym }}{{ $dpsPlan->total_installment }}</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <span>Per Installment</span>
                        <span>{{ siteCurrency()->cur_sym }}{{ $dpsPlan->per_installment }}</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <span>Interest Rate</span>
                        <span>{{ $dpsPlan->interest_rate }}%</span>
                    </li>
                    <form action="{{ route('user.apply.dps.plan', $dpsPlan->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Apply Now</button>
                    </form>
                </ul>
            </div>
        @endforeach
    </div>
@endsection
