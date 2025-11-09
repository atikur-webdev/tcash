@extends('user.layouts.dashboard-master')
@section('panel')
    <div class="user-dashboard-items-wrapper">
        <h3>Send Money</h3>
        <form action="{{ route('user.send.money') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control" name="send_money_email" placeholder="Enter email">
            </div>
            <div class="input-group mb-3">
                <input type="number" step="any" class="form-control" name="amount" id="amount"
                    placeholder="Enter your amount">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">{{ siteCurrency()->cur_text }}</span>
                </div>
            </div>
            <div class="mb-3">
                <p>Fixed Charge: <span id="fixed-charge">{{ $fixedCharge }}</span><strong>{{ siteCurrency()->cur_text }}</strong></p>
                <p>Percent Charge: <span id="percent-charge">{{ $percentCharge }}</span><strong>%</strong></p>
                <p>Total deduction: <span id="total-charge">0</span><strong>{{ siteCurrency()->cur_text }}</strong></p>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Send Money</button>
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

            let percentCalculate = floatAmount * percentCharge / 100
            let percentFloatCalculate = parseFloat(percentCalculate)
            let totalCharge = percentCalculate + fixedCharge
            // let percentTotalCharge = parseFloat(totalCharge)
            let totalFloatCharge = parseFloat(totalCharge)

            let totalCalculate = floatAmount + totalCharge
            totalChargeEl.text(totalCalculate.toFixed(2))


            // let fixedChargeEl = document.getElementById('fixed-charge');
            // let percentChargeEl = document.getElementById('percent-charge');
            // let totalChargeEl = document.getElementById('total-charge');

            // document.getElementById('amount').addEventListener('input', function() {
            //     let amount = parseFloat(this.value);
            //     let percentCalculate = parseFloat(amount * percentCharge / 100) 
            //     let totalCharge = parseFloat(percentCalculate + fixedCharge) 
            //     let totalCalculate = amount + totalCharge
            //     console.log(totalCalculate);

            //     totalChargeEl.innerText = totalCalculate.toFixed(2) 

            // })
        })
    </script>
@endpush
