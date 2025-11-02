@extends('admin.layouts.master')

@section('content')
    <div class="container content-management-edit">
        <div class="banner-header d-flex justify-content-between">
            <h2>Sitesetting section</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#siteSetting">+ Add new</button>
        </div>
        <form action="{{ route('admin.section.single.update', ['key' => 'siteSetting']) }}" method="POST">
            @csrf
            <div class="mb-3">
                <div class="mb-2">
                    <label class="form-label" for="title">Copyright Site Name</label>
                    <input type="text" id="title" name="name"
                        value="{{ $sectionContent->data_value->name ?? '' }}" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="link">Copyright Site Link</label>
                    <input type="text" id="link" name="link"
                        value="{{ $sectionContent->data_value->link ?? '' }}" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="logo">Page Logo</label>
                    <input type="text" id="logo" name="logo" class="form-control"
                        value="{{ $sectionContent->data_value->logo }}">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="openingTime">Opening Time</label>
                    <input type="time" class="form-control" id="openingTime" name="opening_time"
                        value="{{ $sectionContent->data_value->opening_time }}">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="closingTime">Closing Time</label>
                    <input type="time" class="form-control" id="closingTime" name="closing_time"
                        value="{{ $sectionContent->data_value->closing_time }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <div class="mt-7 ">
        <table class="table table-striped bg-white admin-table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Social Media Name</th>
                    <th>Social Link Icon</th>
                    <th>Social Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sectionElements as $element)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $element->data_value->social_link_name }}</td>
                        <td>{{ $element->data_value->social_link_name }}</td>
                        <td>{{ $element->data_value->social_link }}</td>
                        <td>
                            <a href="javascript:void(0)" class="about_table_edit btnEdit"
                                data-action="{{ route('admin.section.update', ['id' => $element->id]) }}"
                                data-resource="{{ json_encode($element->data_value) }}">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="javascript:void(0)" class="about_table_delete btnReject"
                                data-action="{{ route('admin.section.delete', ['id' => $element->id]) }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for add-->
    <div class="modal fade" id="siteSetting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">About our plan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.section.save', ['key' => 'siteSetting']) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="socialLinkName">Social Link Name</label>
                            <input type="text" id="socialLinkName" name="social_link_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="socialLinkIcon">Social Link icon</label>
                            <input type="text" id="socialLinkIcon" name="social_link_icon" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="socialLink">Social Link</label>
                            <input type="text" id="socialLink" name="social_link" class="form-control">
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


    <!-- Modal for edit-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="socialLinkName">Social Link Name</label>
                            <input type="text" id="socialLinkName" name="social_link_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="socialLinkIcon">Social Link icon</label>
                            <input type="text" id="socialLinkIcon" name="social_link_icon" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="socialLink">Social Link</label>
                            <input type="text" id="socialLink" name="social_link" class="form-control">
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

    <!-- Modal for delete-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation alert!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body border-bottom">
                        Are you sure to delete this item?
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
        $('.btnEdit').on('click', function() {
            const action = $(this).attr('data-action');
            const resource = $(this).data('resource');

            const modal = $('#editModal');

            modal.find('[name=social_link_name]').val(resource.social_link_name);
            modal.find('[name=social_link_icon]').val(resource.social_link_icon);
            modal.find('[name=social_link]').val(resource.social_link);
            modal.find('form').attr('action', action);
            modal.modal('show');
        })
        $('.btnReject').on('click', function() {
            const action = $(this).attr('data-action');
            $('#deleteModal').find('form').attr('action', action);
            $('#deleteModal').modal('show');
        })
    </script>
@endpush
