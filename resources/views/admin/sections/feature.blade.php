@extends('admin.layouts.master')

@section('content')
    <div class="container content-management-edit">
        <div class="banner-header d-flex justify-content-between">
            <h2>Feature section</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#featureModal">+ Add new</button>
        </div>
        {{-- <form action="{{ route('admin.section.single.update', ['key' => 'feature']) }}" method="POST">
            @csrf
            <div class="mb-3">
                <div class="mb-2">
                    <label class="form-label" for="title">Feature Title One</label>
                    <input type="text" id="title" name="feature_title_one" class="form-control" value="{{ $sectionContent->data_value->feature_title_one }}">
                </div>
                
                <div class="mb-5">
                    <label class="form-label" for="contentOne">Feature Content One</label>
                    <textarea type="text" id="contentOne" name="feature_content_one" class="form-control">{{ $sectionContent->data_value->feature_title_one }}</textarea>
                </div>
                 <div class="mb-2">
                    <label class="form-label" for="titleTwo">Feature Title Two</label>
                    <input type="text" id="titleTwo" name="feature_title_two" class="form-control" value="{{ $sectionContent->data_value->feature_title_two }}">
                </div>

                <div class="mb-5">
                    <label class="form-label" for="contentTwo">Feature Content Two</label>
                    <textarea type="text" id="contentTwo" name="feature_content_two" class="form-control">{{ $sectionContent->data_value->feature_title_two }}</textarea>
                </div>
                 <div class="mb-2">
                    <label class="form-label" for="titleThree">Feature Title Three</label>
                    <input type="text" id="titleThree" name="feature_title_three" class="form-control" value="{{ $sectionContent->data_value->feature_title_three }}">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="contentThree">Feature Content Three</label>
                    <textarea type="text" id="contentThree" name="feature_content_three" class="form-control">{{ $sectionContent->data_value->feature_title_three }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form> --}}
    </div>


    <div class="mt-7 ">
        <table class="table table-striped bg-white admin-table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Statistic Count</th>
                    <th>Statistic Title</th>
                    <th>Statistic Icon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              
                 @foreach ($sectionElements as $element)
                  
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $element->data_value->feature_title }}</td>
                        <td>{{ $element->data_value->feature_content }}</td>
                        <td>{{ $element->data_value->feature_icon }}</td>
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
    <div class="modal fade" id="featureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Our Statistics</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.section.save', ['key' => 'feature']) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="mb-2">
                                <label class="form-label" for="title">Feature Title</label>
                                <input type="text" id="title" name="feature_title" class="form-control">
                            </div>
                             <div class="mb-2">
                                <label class="form-label" for="icon">Feature Icon</label>
                                <input type="text" id="icon" name="feature_icon" class="form-control">
                            </div>
                            <div class="mb-5">
                                <label class="form-label" for="content">Feature Content</label>
                                <textarea type="text" id="content" name="feature_content" class="form-control"></textarea>
                            </div>
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
                         <div class="mb-2">
                                <label class="form-label" for="title">Feature Title</label>
                                <input type="text" id="title" name="feature_title" class="form-control">
                            </div>
                             <div class="mb-2">
                                <label class="form-label" for="icon">Feature Icon</label>
                                <input type="text" id="icon" name="feature_icon" class="form-control">
                            </div>
                            <div class="mb-5">
                                <label class="form-label" for="content">Feature Content</label>
                                <textarea type="text" id="content" name="feature_content" class="form-control"></textarea>
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

            modal.find('[name=feature_title]').val(resource.feature_title);
            modal.find('[name=feature_icon]').val(resource.feature_icon);
            modal.find('[name=feature_content]').val(resource.feature_content);
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

