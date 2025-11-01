@extends('admin.layouts.master')

{{-- @section('content')
    <div class="content-management">
        <h1>Content management system</h1>
        <div class="content-wrapper">
            @foreach ($sections as $section)
                <a href="{{ route('admin.section.edit', $section->id) }}">
                    {{ $section->name }}
                </a>
            @endforeach
        </div>
    </div>
@endsection --}}
@section('content')
    <div class="content-management">
        <h1>Content management system</h1>
        <div class="d-flex flex-wrap gap-3">
            <div class="content-wrapper">
                <a href="{{ route('admin.section.edit.banner') }}" class="btn btn-outline-primary">
                    Banner Section
                </a>
            </div>

            <div class="content-wrapper">
                <a href="{{ route('admin.section.about.edit') }}" class="btn btn-outline-primary">
                    About Section
                </a>
            </div>
            <div class="content-wrapper">
                <a href="{{ route('admin.section.edit.feature') }}" class="btn btn-outline-primary">
                    Feature Section
                </a>
            </div>
            <div class="content-wrapper">
                <a href="{{ route('admin.section.edit.statistic') }}" class="btn btn-outline-primary">
                    Statistics Section
                </a>
            </div>
            <div class="content-wrapper">
                <a href="{{ route('admin.section.edit.choose') }}" class="btn btn-outline-primary">
                    Choose Us Section
                </a>
            </div>
            <div class="content-wrapper">
                <a href="{{ route('admin.section.edit.service') }}" class="btn btn-outline-primary">
                    Service Section
                </a>
            </div>
            <div class="content-wrapper">
                <a href="{{ route('admin.section.edit.project') }}" class="btn btn-outline-primary">
                    Project Section
                </a>
            </div>
            <div class="content-wrapper">
                <a href="{{ route('admin.section.edit.team') }}" class="btn btn-outline-primary">
                    Team Section
                </a>
            </div>
              <div class="content-wrapper">
                <a href="{{ route('admin.section.edit.testimonial') }}" class="btn btn-outline-primary">
                    Testimonial Section
                </a>
            </div>
             <div class="content-wrapper">
                <a href="{{ route('admin.section.edit.footer') }}" class="btn btn-outline-primary">
                    Footer Section
                </a>
            </div>
        </div>

    </div>
@endsection

<div>
