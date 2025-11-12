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
                        <span>{{ $dpsPlan->total_installment }}</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <span>Per Installment</span>
                        <span>{{ siteCurrency()->cur_sym }}{{ $dpsPlan->per_installment }}</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <span>Interest Rate</span>
                        <span>{{ $dpsPlan->interest_rate }}%</span>
                    </li>
                    <button type="submit" class="btn btn-primary w-100 btnAcceptDps" data-bs-toggle="modal"
                        data-bs-target="#applyDpsModal"
                        data-action="{{ route('user.apply.dps.plan', $dpsPlan->id) }}">
                        Apply Now
                    </button>
                </ul>
            </div>
        @endforeach
    </div>


    <!-- Modal -->
    <div class="modal fade" id="applyDpsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <p>Are you sure to purchase this dps</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.btnAcceptDps').on('click', function() {
            const action = $(this).attr('data-action');
            const modal = $('#applyDpsModal');
            modal.find('form').attr('action', action);
        })
    </script>
@endpush