@extends('user.layouts.dashboard-master')
@section('panel')
    <div class="user-dashboard-items-wrapper">
        <h3 class="mb-3">My dps</h3>
        <table class="table table-striped">
            <tr>
                <td>Dps name</td>
                <td>Installment Interval</td>
                <td>Total installment</td>
                <td>Per installment</td>
                <td>Interest rate</td>
                <td>Given installment</td>
            </tr>
            @foreach ($userDps as $dps)
                <tr>
                    <td>{{ $dps->dps->name }}</td>
                    <td>{{ $dps->dps->installment_interval }}days</td>
                    <td>{{ $dps->dps->total_installment }}</td>
                    <td>{{ siteCurrency()->cur_sym }}{{ $dps->dps->per_installment }}</td>
                    <td>{{ $dps->dps->interest_rate }}%</td>
                    <td>{{ $dps->given_installment }}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection