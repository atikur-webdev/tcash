@extends('admin.layouts.master')

@section('content')
    <div class="container content-management-edit">
        <div class="banner-header d-flex justify-content-between">
            <h2>Banner section</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bannerModal">+ Add new</button>
        </div>
    </div>

        <div class="mt-7 bg-white">
            <table class="table table-striped admin-table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Images</th>
                        <th>Sub Title</th>
                        <th>Title</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sectionElements as $element)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <img class="banner_table_image"
                                    src="{{ asset('assets/images/' . $element->data_value->file) }}" alt="">
                            </td>
                            <td>{{ $element->data_value->subtitle }}</td>
                            <td>{{ $element->data_value->title }}</td>
                            <td>
                                <a class="about_table_edit btnBannerEdit"
                                    data-action="{{ route('admin.section.update', ['key' => 'banner', 'id' => $element->id]) }}"
                                    data-resource="{{ json_encode($element->data_value) }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="about_table_delete btnReject" data-action="">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection



    <!-- Modal for add-->
    <div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Banner section</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.section.save', ['key' => 'banner']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="file" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="subtitle">Subtitle </label>
                            <input type="text" id="subtitle" name="subtitle" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="title">Title </label>
                            <input type="text" id="title" name="title" class="form-control">
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
    <div class="modal fade" id="bannerEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Banner section</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="subtitle">Images</label>
                            <input type="file" id="subtitle" name="file" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="title">Title </label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="subtitle">Subtitle </label>
                            <input type="text" id="subtitle" name="subtitle" class="form-control">
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


    @push('scripts')
        <script>
            $('.btnBannerEdit').on('click', function() {
                const action = $(this).attr('data-action');
                const resource = $(this).data('resource');
                const modal = $('#bannerEditModal');
                modal.find('[name=title]').val(resource.title);
                modal.find('[name=subtitle]').val(resource.subtitle);
                modal.find('form').attr('action', action);
                modal.modal('show');
            })
        </script>
    @endpush
