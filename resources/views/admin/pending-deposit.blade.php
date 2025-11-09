@extends('admin.layouts.master')
@section('content')
    <div class="user-wrapper">
        <h3 class="mb-3">Pending Deposits</h3>
        <table class="table table-striped">
            <tr style="font-size: 12px">
                <td>Date</td>
                <td>User name</td>
                <td>User email</td>
                <td>Sent amount</td>
                <td>Charge</td>
                <td>Requested amount</td>
                <td>Status</td>
                <td>Document</td>
                <td>trx</td>
                <td>Action</td>
            </tr>
            @foreach ($depositRequests as $request)
                <tr style="font-size: 11px">
                    <td>{{ $request->created_at }}</td>
                    <td>{{ $request->user->name }}</td>
                    <td>{{ $request->user->email }}</td>
                    <td>{{ siteCurrency()->cur_sym }}{{ $request->sent_amount }}</td>
                    <td>{{ siteCurrency()->cur_sym }}{{ $request->charge }} </td>
                    <td>{{ siteCurrency()->cur_sym }}{{ $request->amount }} </td>
                    <td>
                        @if ($request->status == 0)
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </td>
                    <td class="popup-gallery">
                        <a href="{{ asset($request->document) }}">
                            <img src="{{ asset($request->document) }}" alt="" class="custom-img_admin">
                        </a>
                    </td>
                    <td>{{ $request->trx }}</td>
                    <td class="d-flex gap-1 border-0">
                        <a href="javascript:void(0)" class="btn btn-primary depositBtn" data-bs-toggle="modal"
                            data-bs-target="#acceptDepositModal"
                            data-action="{{ route('admin.deposit.accept', $request->id) }}">Accept</a>
                        <a href="javascript:void(0)" class="btn btn-danger depositRejectBtn" data-bs-toggle="modal"
                            data-bs-target="#rejectDepositModal"
                            data-action="{{ route('admin.deposit.reject', $request->id) }}">Reject</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <!-- Modal for add-->
    <div class="modal fade" id="acceptDepositModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Accept deposit request</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body border">
                        <p>Are you sure to approve this transaction</p>
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
    <div class="modal fade" id="rejectDepositModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Accept deposit request</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body border">
                        <p>Are you sure to reject this transaction</p>
                        <input type="text" name="remarks" placeholder="Optional message" class="form-control">
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
        const modal = $('#acceptDepositModal');
        const modalReject = $('#rejectDepositModal');
        $('.depositBtn').on('click', function() {
            const action = $(this).attr('data-action');
            modal.find('form').attr('action', action);
            modal.modal('show');

        })

        $('.confirmation').on('click', function() {
            modal.find('form').submit();
        })
        $('.depositRejectBtn').on('click', function() {
            const action = $(this).attr('data-action');
            modalReject.find('form').attr('action', action);
            modalReject.modal('show');
        })
        $('.reject').on('click', function() {
            modal.find('form').submit();
        })
    </script>
@endpush
