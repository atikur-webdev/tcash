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
        <div class="content-wrapper">
            <a href="{{ route('admin.section.edit', ['key' => 'banner']) }}">
                Banner Section
            </a>
        </div>

        <div class="content-wrapper">
            <a href="{{ route('admin.section.mission.edit', ['key' => 'mission']) }}">
                Mission Section
            </a>
        </div>
    </div>
@endsection


@section('content')
 <div class="content-management">
        <h1>Content management system</h1>
        <div class="content-wrapper">
           <a href="{{ route('admin.section.edit', ['key' => 'mission']) }}"></a>
        </div>
@endsection