@extends('admin.layouts.master')
@section('content')
    <div class="user-refer-button d-flex justify-content-between align-items-center">
        <h3>Dps Plan</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dpsPlanModal">+ Add new plan</button>
    </div>

    <table class="table table-striped mt-3">
        <tr>
            <td>Name</td>
            <td>Installment Interval</td>
            <td>Total Installment</td>
            <td>Per Installment</td>
            <td>Interest Rate</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
        @foreach ($dps as $dpsPlan)
            <tr>
                <td>{{ $dpsPlan->name }}</td>
                <td>{{ $dpsPlan->installment_interval }}</td>
                <td>{{ $dpsPlan->total_installment }} </td>
                <td>{{ siteCurrency()->cur_sym }} {{ $dpsPlan->per_installment }}</td>
                <td>{{ $dpsPlan->interest_rate }}%</td>
                <td>
                    @if ($dpsPlan->disable == 1)
                        <span class="badge bg-danger">Disabled</span>
                    @else
                        <span class="badge bg-primary">Enabled</span>
                    @endif
                </td>
                <td>
                    <a href="#" class="btn btn-primary editDpsBtn"
                        data-action="{{ route('admin.edit.dps.plan', $dpsPlan->id) }}" data-bs-toggle="modal"
                        data-bs-target="#dpsEditModal" data-resource="{{ $dpsPlan }}">Edit</a>
                    @if ($dpsPlan->disable == 1)
                        <a href="#" class="btn btn-success enableDpsBtn" data-bs-toggle="modal"
                        data-bs-target="#dpsEnableModal" data-action="{{ route('admin.enable.dps.plan', $dpsPlan->id) }}">Enable</a>
                    @else
                        <a href="#" class="btn btn-danger disableDpsBtn" data-bs-toggle="modal"
                            data-bs-target="#dpsDisableModal"
                            data-action="{{ route('admin.disable.dps.plan', $dpsPlan->id) }}">Disable</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

    <!-- Modal for dps -->
    <div class="modal fade" id="dpsPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dps Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.add.dps.plan') }}" method="post">
                    @csrf
                    <div class="modal-body border">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter deposit plan name"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="installmentInterval" class="d-block">Installment Interval</label>
                            <input type="number" name="installment_interval" id="installmentInterval" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="totalInstallment">Total Installment</label>
                            <input type="number" name="total_installment" id="totalInstallment" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="perInstallment">Per Installment</label>
                            <input type="number" name="per_installment" id="perInstallment" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="interestRate">Interest Rate</label>
                            <input type="number" name="interest_rate" id="interestRate" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for edit -->
    <div class="modal fade" id="dpsEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body border">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter deposit plan name"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="installmentInterval" class="d-block">Installment Interval</label>
                            <input type="number" name="installment_interval" id="installmentInterval"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="totalInstallment">Total Installment</label>
                            <input type="number" name="total_installment" id="totalInstallment" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="perInstallment">Per Installment</label>
                            <input type="number" name="per_installment" id="perInstallment" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="interestRate d-block">Interest Rate</label>
                            <input type="number" name="interest_rate" id="interestRate" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal for disable -->
    <div class="modal fade" id="dpsDisableModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Disable Dps</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body border">
                        <div class="mb-3">
                            <p>Are you sure to disable this dps</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- Modal for enable -->
    <div class="modal fade" id="dpsEnableModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enable Dps</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body border">
                        <div class="mb-3">
                            <p>Are you sure to enable this dps</p>
                        </div>
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
        $('.editDpsBtn').on('click', function() {
            const action = $(this).attr('data-action');
            const modal = $('#dpsEditModal');
            const resource = $(this).data('resource');
            modal.find('form').attr('action', action);
            modal.find('[name=name]').val(resource.name);
            modal.find('[name=installment_interval]').val(resource.installment_interval);
            modal.find('[name=total_installment]').val(resource.total_installment);
            modal.find('[name=per_installment]').val(resource.per_installment);
            modal.find('[name=interest_rate]').val(resource.interest_rate);
        })
        $('.disableDpsBtn').on('click', function() {
            const action = $(this).attr('data-action');
            const modal = $('#dpsDisableModal');
            modal.find('form').attr('action', action);
        })
        $('.enableDpsBtn').on('click', function() {
            const action = $(this).attr('data-action');
            const modal = $('#dpsEnableModal');
            modal.find('form').attr('action', action);
        })

    </script>
@endpush
