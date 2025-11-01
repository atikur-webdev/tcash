@extends('admin.layouts.master')

@section('content')
    <div class="container content-management-edit">
        <div class="banner-header d-flex justify-content-between">
            <h2>Project section</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#projectModal">+ Add new</button>
        </div>
        <form action="{{ route('admin.section.single.update', ['key' => 'project']) }}" method="POST">
            @csrf
            <div class="mb-3">
                <div class="mb-2">
                    <label class="form-label" for="title">Project Title</label>
                    <input type="text" id="title" name="project_title"
                        value="{{ $sectionContent->data_value->project_title ?? '' }}" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="content">Project Heading</label>
                    <textarea type="text" id="content" name="project_heading" class="form-control">{{ $sectionContent->data_value->project_heading ?? '' }}</textarea>
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
                    <th>Project Image</th>
                    <th>Project Image Text</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sectionElements as $element)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('assets/images/'. $element->data_value->file ) }}" alt="" class="table_image">
                        </td>
                        <td>{{ $element->data_value->project_image_text }}</td>
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
    <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add new Project</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.section.save', ['key' => 'project']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="projectImage">Project Image</label>
                            <input type="file" id="projectImage" name="file" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="projectImageText">Project Image text</label>
                            <input type="text" id="projectImageText" name="project_image_text" class="form-control">
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
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="projectImage">Project Image</label>
                            <input type="file" id="projectImage" name="file" class="form-control">
                            <br>
                            <label class="form-label" for="projectImageText">Project Image Text</label>
                            <input type="text" id="projectImageText" name="project_image_text" class="form-control">
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
            modal.find('[name=project_image_text]').val(resource.project_image_text);
          
            
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
