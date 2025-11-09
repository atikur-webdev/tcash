@extends('user.layouts.dashboard-master')
@section('panel')
    <div class="user-dashboard-items-wrapper">
        <h3>Money request history</h3>
        <table class="table table-striped">
            <tr>
                <td>User id</td>
                <td>User name</td>
                <td>User email</td>
                <td>Request amount</td>
                <td>Status</td>
                <td>trx</td>
                <td>Action</td>
            </tr>
            @foreach ($moneyRequests as $moneyRequest)
                <tr>
                    <td>{{ $moneyRequest->user->id }}</td>
                    <td>{{ $moneyRequest->user->name }}</td>
                    <td>{{ $moneyRequest->user->email }}</td>
                    <td>{{ siteCurrency()->cur_sym }}{{ $moneyRequest->amount }}</td>
                    <td>
                        @if ($moneyRequest->status == 0)
                            <span class="badge bg-warning">Pending</span>
                        @endif
                    </td>
                    <td>{{ $moneyRequest->trx }}</td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-primary moneyRequestBtn" data-bs-toggle="modal"
                            data-bs-target="#acceptDepositModal"
                            data-action="{{ route('user.accept.pending.money.request', $moneyRequest->id) }}">Accept</a>
                        <a href="javascript:void(0)" class="btn btn-danger moneyRequestRejectBtn" data-bs-toggle="modal"
                            data-bs-target="#rejectDepositModal" data-action="{{ route('user.reject.pending.money.request', $moneyRequest->id) }}">Reject</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>



    <!-- Modal for add-->
    <div class="modal fade" id="acceptMoneyRequestModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Accept deposit request</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <p>Are you sure to send this amount</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary confirmation">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for reject-->
    <div class="modal fade" id="rejectMoneyRequestModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Accept deposit request</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <p>Are you sure to reject this transaction</p>
                        <input type="text" name="reason" placeholder="Reason for reject" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary reject">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        const modal = $('#acceptMoneyRequestModal');
        const modalReject = $('#rejectMoneyRequestModal');
        $('.moneyRequestBtn').on('click', function() {
            const action = $(this).attr('data-action');
            modal.find('form').attr('action', action);
            modal.modal('show');

        })

        $('.confirmation').on('click', function() {
            modal.find('form').submit();
        })
        $('.moneyRequestRejectBtn').on('click', function() {
            const action = $(this).attr('data-action');
            modalReject.find('form').attr('action', action);
            modalReject.modal('show');
        })
        $('.reject').on('click', function() {
            modal.find('form').submit();
        })

        
    </script>
@endpush
