@extends('admin.layouts.master')
@section('content')
    <div class="user-wrapper">
        <div class="user-refer-button d-flex justify-content-between align-items-center">
            <h1>Refer level</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#levelModal">+ Add new</button>
        </div>
        <table class="table table-striped">
            <tr>
                <td>Level</td>
                <td>Percent amount</td>
                <td>Action</td>
            </tr>
            @foreach ($levels as $level)
                <tr>
                    <td>{{ $level->level }}</td>
                    <td>{{ $level->percent_amount }}</td>
                    <td>
                        <a href="#" class="btn btn-primary btnEditLevel" data-bs-toggle="modal"
                            data-bs-target="#editLevelModal"
                            data-action="{{ route('admin.edit.refer.level', $level->level) }}"
                            data-percent="{{ $level->percent_amount }}">Edit</a>
                        <a href="#" class="btn btn-danger btnDeleteLevel" data-bs-toggle="modal"
                            data-bs-target="#deleteLevelModal"
                            data-action="{{ route('admin.delete.refer.level', $level->level) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>





    <!--add refer level Modal -->
    <div class="modal fade" id="levelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Set percent level</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.refer.level') }}" method="post">
                    @csrf
                    <div class="modal-body border">
                        <div class="mb-3">
                            <h6>Level will be set automatically</h3>
                        </div>
                        <div class="mb-3">
                            <label for="percentage">Percentage</label>
                            <input type="text" id="percentage" name="percentage" placeholder="Set the percentage"
                                class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for edit-->
    <div class="modal fade" id="editLevelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body border">
                        <div class="mb-3">
                            <label for="edit">Percentage</label>
                            <input type="text" name="percentage" id="edit" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteLevelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body border">
                        Are you sure to delete this level
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary confirmDelete">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $('.btnEditLevel').on('click', function() {
            const action = $(this).attr('data-action');
            const percent = $(this).attr('data-percent');
            const modal = $('#editLevelModal');
            modal.find('form').attr('action', action);
            modal.find('input[name="percentage"]').val(percent);
        })
        $('.btnDeleteLevel').on('click', function() {
            const action = $(this).attr('data-action');
            const modal = $('#deleteLevelModal');
            modal.find('form').attr('action', action);
        })
    </script>
@endpush
