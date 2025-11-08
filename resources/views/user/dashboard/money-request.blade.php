@extends('user.layouts.dashboard-master')
@section('panel')
    <div class="user-dashboard-items-wrapper">
        <h3 class="mb-3">Money Request</h3>
        <form action="{{ route('user.send.money.request') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control" name="money_request_email" placeholder="Enter receiver email">
            </div>
            <div class="input-group mb-3">
                <input type="number" class="form-control" id="amount" name="money_request_amount" placeholder="Enter your amount">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">{{ siteCurrency()->cur_text }}</span>
                </div>
            </div>
            <div class="mb-3">
                <p>Fixed Charge: <span
                        id="fixed-charge">{{ $fixedCharge }}</span><strong>{{ siteCurrency()->cur_text }}</strong></p>
                <p>Percent Charge: <span id="percent-charge">{{ $percentCharge }}</span><strong>%</strong></p>
                <p>Total deduction: <span id="total-charge">0</span><strong>{{ siteCurrency()->cur_text }}</strong></p>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Send Request</button>
            </div>
        </form>
    </div>
@endsection


@push('scripts')
    <script>
        let fixedCharge = {{ $fixedCharge }}
        
        let percentCharge = {{ $percentCharge }}
        let fixedChargeEl = document.getElementById('fixed-charge');
        let percentChargeEl = document.getElementById('percent-charge');
        let totalChargeEl = document.getElementById('total-charge');

        document.getElementById('amount').addEventListener('input', function() {
            let amount = parseFloat(this.value);
            console.log(amount);
            
            let percentCalculate = parseFloat(amount * percentCharge / 100)
            let totalCharge = parseFloat(percentCalculate + fixedCharge)
            let totalCalculate = amount - totalCharge
            console.log(totalCalculate);

            totalChargeEl.innerText = totalCalculate.toFixed(2)

        })
    </script>
@endpush
