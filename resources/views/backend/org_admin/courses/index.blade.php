@extends('layouts.backend.main')

@section('title', 'Course List | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">Courses</h4>
            <a href="{{ route('courses.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-2"></i>New Course
            </a>
        </div>
        @include('partials._notice')
        {{-- Course Table --}}
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-show-dt mb-4">
                        <thead>
                            <tr>
                                <th>{{ __('Course Name') }}</th>
                                <th>{{ __('Course Thumbnail') }}</th>
                                <th>{{ __('Duration') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->course_name }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $course->course_image) }}" alt="Course Thumbnail" width="50">
                                    </td>
                                    <td>{{ $course->duration }} days</td>
                                    <td>
                                        @if (!$course->is_active)
                                        <span class="badge bg-label-danger">Disabled</span>
                                        @else
                                            <span class="badge bg-label-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href=""
                                           class="btn btn-sm btn-info me-1">
                                            <i class="fa-solid fa-circle-info me-2"></i>Details
                                        </a>
                                        <a href=""
                                           class="btn btn-sm btn-warning me-1">
                                            <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- End of Course Table --}}
    </div>

@endsection
