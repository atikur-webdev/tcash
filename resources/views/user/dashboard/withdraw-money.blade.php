@extends('user.layouts.dashboard-master')

@section('panel')
    <div class="user-dashboard-items-wrapper">
        <h3>Withdraw Money</h3>
        <form action="{{ route('user.withdraw.now') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter your amount">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">{{ siteCurrency()->cur_text }}</span>
                </div>
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" name="transaction_number"
                    placeholder="Enter your account number">
            </div>
            <div class="mb-3">
                <p>Fixed charge <span id="fixed-charge">{{ $fixedCharge }} <strong>{{ siteCurrency()->cur_text }}</strong> </span> </p>
                <p>Percent charge <span id="percent-charge">{{ $percentCharge }} <strong>%</strong> </span></p>
                <p>Receivable amount <span id="total-charge">0 <strong>{{ siteCurrency()->cur_text }}</strong></span> </p>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Withdraw Money</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        let fixedCharge = {{ $fixedCharge }}
        let percentCharge = {{ $percentCharge }}
        
        let fixedChargeEl = $('#fixed-charge');
        let percentChargeEl = $('#percent-charge');
        let totalChargeEl = $('#total-charge');
        $('#amount').on('input', function() {
            let amount = $(this).val();
            
            let floatAmount = parseFloat(amount);

            let percentCalculate = floatAmount * percentCharge / 100;
            
            let percentFloatCharge = parseFloat(percentCalculate);
            let totalCharge = fixedCharge + percentFloatCharge;
            let totalFloatCharge = parseFloat(totalCharge);
            let totalCalculate = floatAmount - totalFloatCharge;
            totalChargeEl.text(totalCalculate.toFixed(2));
        })
    </script>
@endpush