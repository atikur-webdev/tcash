@extends('admin.layouts.master')

@section('content')
    <div class="container content-management-edit">
        <div class="banner-header d-flex justify-content-between">
            <h2>About section</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#planModal">+ Add new</button>
        </div>
        <form action="{{ route('admin.section.single.update', ['key' => 'mission']) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="heading">About Heading</label>
                <input type="text" id="heading" name="aboutHeading" value="{{ $sectionContent->data_value->aboutContent ?? '' }}"
                    class="form-control">
                   
                <br>
                <label for="content">About Content</label>
                <input type="text" id="content" name="aboutContent" value="{{ $sectionContent->data_value->aboutContent ?? '' }}"
                    class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <div class="mt-7 ">
        <table class="table table-striped bg-white">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Story</th>
                    <th>Sub Story</th>
                    <th>Mission</th>
                    <th>Sub Mission</th>
                    <th>Vision</th>
                    <th>Sub Vision</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sectionElements as $element)

                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->data_value->story }}</td>
                    <td>{{ $element->data_value->storyTwo }}</td>
                    <td>{{ $element->data_value->mission }}</td>
                    <td>{{ $element->data_value->missionTwo }}</td>
                    <td>{{ $element->data_value->vision }}</td>
                    <td>{{ $element->data_value->visionTwo }}</td>
                    <td>
                        <a href="javascript.void(0)" data-action="" class="btn btn-primary">Edit</a>
                        ||
                        <a href="" class="btn btn-primary">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
    <!-- Modal -->
    <div class="modal fade" id="planModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">About our plan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.section.update', ['key' => 'mission']) }}" method="post">
    
                        @csrf
                        <div class="mb-3">
                            <label for="story">Story</label>
                            <input type="text" id="story" name="story" value="" class="form-control">
                            <br>
                            <label for="extraStory">Extra story</label>
                            <input type="text" id="extraStory" name="storyTwo" value="" class="form-control">
                        </div>
    
                        <div class="mb-3">
                            <label for="mission">Mission</label>
                            <input type="text" id="mission" name="mission" value="" class="form-control">
                            <br>
                            <label for="extraMission">Extra Mission</label>
                            <input type="text" id="extraMission" name="missionTwo" value="" class="form-control">
                        </div>
    
                        <div class="mb-3">
                            <label for="vision">Vision</label>
                            <input type="text" id="vision" name="vision" value="" class="form-control">
                            <br>
                            <label for="extraVision">Extra Vision</label>
                            <input type="text" id="extraVision" name="visionTwo" value="" class="form-control">
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
@endsection

{{-- {
    "story": "sfsdfsd",
    "_token": "Agj6RH2dUosOByoJXNnuR4YKxeQFRfqRxev5qsTS",
    "vision": "sfsdf",
    "mission": "sdfsdf",
    "storyTwo": "fsdfsdf",
    "visionTwo": "sdfsdf",
    "missionTwo": "sfsdf"
} --}}

