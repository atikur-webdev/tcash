@extends('admin.layouts.master')
@section('content')
    <div class="user-wrapper">
        <h3 class="mb-3">
            Pending Withdraws
        </h3>
        <table class="table table-striped">
            <tr>
                <td>User id</td>
                <td>Amount</td>
                <td>Transaction number</td>
                <td>Status</td>
                <td>trx</td>
                <td>Action</td>
            </tr>
            @foreach ($withdraws as $withdraw)
                <tr>
                    <td>{{ $withdraw->user_id }}</td>
                    <td>{{ $withdraw->amount }}</td>
                    <td>{{ $withdraw->transaction_number }}</td>
                    <td>
                        @if ($withdraw->status == 0)
                            <span class="badge bg-warning">Pending</span>
                        @endif
                    </td>
                    <td>{{ $withdraw->trx }}</td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-primary btnWithdraw" data-bs-toggle="modal"
                            data-bs-target="#acceptWithdrawModal" data-action="{{ route('admin.accept.pending.withdraw', $withdraw->id) }}">Accept</a>
                        <a href="javascript:void(0)" class="btn btn-danger btnReject" data-bs-toggle="modal"
                            data-bs-target="#rejectWithdrawModal" data-action="{{ route('admin.reject.pending.withdraw', $withdraw->id) }}">Reject</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


    <!-- Modal for add-->
    <div class="modal fade" id="acceptWithdrawModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Accept withdraw request</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body border">
                        <p>Are you sure to approve this withdraw</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary confirmation">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for reject-->
    <div class="modal fade" id="rejectWithdrawModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reject withdraw request</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body border">
                        <p>Are you sure to approve this withdraw</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger reject">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
<script>
         const modal = $('#acceptWithdrawModal');
        const modalReject = $('#rejectWithdrawModal');
        $('.btnWithdraw').on('click', function() {
            const action = $(this).attr('data-action');
            modal.find('form').attr('action', action);
            modal.modal('show');

        })

        $('.confirmation').on('click', function() {
            modal.find('form').submit();
        })
        $('.btnReject').on('click', function() {
            const action = $(this).attr('data-action');
            modalReject.find('form').attr('action', action);
            modalReject.modal('show');
        })
        $('.reject').on('click', function() {
            modal.find('form').submit();
        })
    </script>
@endpush