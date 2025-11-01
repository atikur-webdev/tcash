@extends('admin.layouts.master')

@section('content')
    <div class="container content-management-edit">
        <div class="banner-header d-flex justify-content-between">
            <h2>About section</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#footerModal">+ Add new</button>
        </div>
        <form action="{{ route('admin.section.single.update', ['key' => 'footer']) }}" method="POST">
            @csrf
            <div class="mb-3">
                <div class="mb-2">
                    <label class="form-label" for="footerHeading">Footer Heading</label>
                    <input type="text" id="footerHeading" name="footer_heading"
                        value="{{ $sectionContent->data_value->footer_heading ?? '' }}" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="footerAddress">Footer Address</label>
                    <input type="text" id="footerAddress" name="footer_address"
                        value="{{ $sectionContent->data_value->footer_address ?? '' }}" class="form-control">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="footerPhone">Footer Phone</label>
                    <input type="text" id="footerPhone" name="footer_phone" class="form-control" value="{{ $sectionContent->data_value->footer_phone }}">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="footerEmail">Footer Email</label>
                    <input type="text" id="footerEmail" name="footer_email" class="form-control" value="{{ $sectionContent->data_value->footer_email }}">
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
                    <th>Footer Link Name</th>
                    <th>Footer Link</th>
                    <th>Footer Link Icon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sectionElements as $element)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $element->data_value->footer_link_name }}</td>
                        <td>{{ $element->data_value->footer_link }}</td>
                        <td>{{ $element->data_value->footer_link_icon }}</td>
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
    <div class="modal fade" id="footerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">About our plan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.section.save', ['key' => 'footer']) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="footerLinkName">Footer Link Name</label>
                            <input type="text" id="footerLinkName" name="footer_link_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="footerLink">Footer Link</label>
                            <input type="text" id="footerLink" name="footer_link" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="footerLinkIcon">Footer Link Icon</label>
                            <input type="text" id="footerLinkIcon" name="footer_link_icon" class="form-control">
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
                            <label class="form-label" for="footerLinkName">Footer Link Name</label>
                            <input type="text" id="footerLinkName" name="footer_link_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="footerLink">Footer Link</label>
                            <input type="text" id="footerLink" name="footer_link" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="footerLinkIcon">Footer Link Icon</label>
                            <input type="text" id="footerLinkIcon" name="footer_link_icon" class="form-control">
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

            modal.find('[name=footer_link_name]').val(resource.footer_link_name);
            modal.find('[name=footer_link_icon]').val(resource.footer_link_icon);
            modal.find('[name=footer_link]').val(resource.footer_link);
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
