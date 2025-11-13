@extends('user.layouts.dashboard-master')
@section('panel')
    <div class="user-dashboard-items-wrapper">
        <table class="table table-striped">
            <tr>
                <td>Dps name</td>
                <td>Per installment amount</td>
                <td>Payment date</td>
                <td>Given installment</td>
            </tr>
            @foreach ($installments as $installment)
                <tr>
                    <td>{{ $installment->userDps->dps->name }}</td>
                    <td>{{ $installment->amount }}</td>
                    <td>{{ $installment->payment_date }}</td>
                    <td>{{ $installment->userDps->given_installment }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
