@extends('admin.layouts.master')

@section('content')
    <div class="container content-management-edit">
        <div class="banner-header d-flex justify-content-between">
            <h2>Feature section</h2>
        </div>
        <form action="{{ route('admin.section.single.update', ['key' => 'feature']) }}" method="POST">
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
        </form>
    </div>
    @endsection