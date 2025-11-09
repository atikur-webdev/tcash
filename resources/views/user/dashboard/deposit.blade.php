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
                <input type="number" class="form-control" id="amount" name="deposit_amount" placeholder="Enter your amount">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">{{ siteCurrency()->cur_text }}</span>
                </div>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="document">
            </div>
            <div class="mb-3">
                <p>Fixed charge <span id="fixed-charge">{{ $fixedCharge }}</span> <strong>{{ siteCurrency()->cur_text }}</strong></p>
                <p>Percent charge <span id="percent-charge">{{ $percentCharge }}</span> <strong>%</strong></p>
                <p>Total payable amount <span id="total-charge">0</span> <strong>{{ siteCurrency()->cur_text }}</strong></p>
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
        let fixedChargeEl = $('#fixed-charge');
        let percentChargeEl = $('#percent-charge');
        let totalChargeEl = $('#total-charge');
        $('#amount').on('input', function() {
            let amount = $(this).val();
            let floatAmount = parseFloat(amount);
            let percentCalculate = floatAmount * percentCharge / 100;
            let percentFloatCalculate = parseFloat(percentCalculate);
            let totalCharge = fixedCharge + percentFloatCalculate;
            let totalCalculate = floatAmount + totalCharge;
            totalChargeEl.text(totalCalculate.toFixed(2))
        })
    </script>
@endpush