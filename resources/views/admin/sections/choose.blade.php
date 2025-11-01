@extends('admin.layouts.master')

@section('content')
    <div class="container content-management-edit">
        <div class="banner-header d-flex justify-content-between">
            <h2>Choose Us section</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#chooseModal">+ Add new</button>
        </div>
        <form action="{{ route('admin.section.single.update', ['key' => 'choose']) }}" method="POST">
            @csrf
            <div class="mb-3">
                <div class="mb-2">
                    <label class="form-label" for="chooseTitle">Choose Us Title</label>
                    <input type="text" id="chooseTitle" name="choose_title"
                        value="{{ $sectionContent->data_value->choose_title ?? '' }}" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="chooseHeading">Choose Us Heading</label>
                    <input type="text" id="chooseHeading" name="choose_heading"
                        value="{{ $sectionContent->data_value->choose_heading ?? '' }}" class="form-control">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="ChooseContent">Choose Us Content</label>
                    <textarea type="text" id="ChooseContent" name="choose_content" class="form-control">{{ $sectionContent->data_value->choose_content ?? '' }}</textarea>
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
                    <th>Card Title</th>
                    <th>Card Content</th>
                    <th>Card Url</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sectionElements as $element)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $element->data_value->card_name }}</td>
                        <td>{{ $element->data_value->card_content }}</td>
                        <td>{{ $element->data_value->card_url }}</td>
                        <td>
                            <a href="javascript:void(0)" class="about_table_edit btnEditpp"
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
    <div class="modal fade" id="chooseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Choose Us Section</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.section.save', ['key' => 'choose']) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="story">Card Name</label>
                            <input type="text" id="story" name="card_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="extraStory">Card Content</label>
                            <textarea type="text" id="extraStory" name="card_content" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="story">Card Url</label>
                            <input type="text" id="story" name="card_url" class="form-control">
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
                            <label class="form-label" for="cardName">Tab Name</label>
                            <input type="text" id="cardName" name="card_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="cardContent">Tab Content</label>
                            <textarea type="text" id="cardContent" name="card_content" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="cardUrl">Card Url</label>
                            <input type="text" id="cardUrl" name="card_url" class="form-control">
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
        
        $('.btnEditpp').on('click', function() {
            const action = $(this).attr('data-action');
            const resource = $(this).data('resource');

            const modal = $('#editModal');

            modal.find('[name=card_name]').val(resource.card_name);
            modal.find('[name=card_content]').val(resource.card_content);
            modal.find('[name=card_url]').val(resource.card_url);
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
