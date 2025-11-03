@extends('admin.layouts.master')

@section('content')
    <div class="container content-management-edit">
        <div class="banner-header d-flex justify-content-between">
            <h2>Breadcrumb section</h2>
        </div>
        <form action="{{ route('admin.section.single.update', ['key' => 'breadcrumb']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <div class="mb-2">
                    <label class="form-label" for="title">Breadcrumb Title</label>
                    <input type="text" id="title" name="breadcrumb_title"
                        value="{{ $sectionContent->data_value->breadcrumb_title ?? '' }}" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="image">Breadcrumb Image</label>
                    <input type="file" id="image" name="file"
                        value="{{ $sectionContent->data_value->file ?? '' }}" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    {{-- 
    <div class="mt-7 ">
        <table class="table table-striped bg-white admin-table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Tab Title</th>
                    <th>Tab Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sectionElements as $element)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $element->data_value->tab_name }}</td>
                        <td>{{ $element->data_value->tab_content }}</td>
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
    </div> --}}

    <!-- Modal for add-->
    {{-- <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">About our plan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.section.save', ['key' => 'about']) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="story">Tab Name</label>
                            <input type="text" id="story" name="tab_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="extraStory">Tab Content</label>
                            <textarea type="text" id="extraStory" name="tab_content" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}


    <!-- Modal for edit-->
    {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label class="form-label" for="story">Tab Name</label>
                            <input type="text" id="story" name="tab_name" class="form-control">
                            <br>
                            <label class="form-label" for="extraStory">Tab Content</label>
                            <textarea type="text" id="extraStory" name="tab_content" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <!-- Modal for delete-->
    {{-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div> --}}
@endsection


@push('scripts')
    <script>
        // $('.btnEdit').on('click', function() {
        //     const action = $(this).attr('data-action');
        //     const resource = $(this).data('resource');

        //     const modal = $('#editModal');

        //     modal.find('[name=tab_name]').val(resource.tab_name);
        //     modal.find('[name=tab_content]').val(resource.tab_content);
        //     modal.find('form').attr('action', action);
        //     modal.modal('show');
        // })
        // $('.btnReject').on('click', function() {
        //     const action = $(this).attr('data-action');
        //     $('#deleteModal').find('form').attr('action', action);
        //     $('#deleteModal').modal('show');
        // })

    
    </script>
@endpush
