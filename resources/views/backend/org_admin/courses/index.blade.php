@extends('layouts.backend.main')

@section('title', 'Course List | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">Courses</h4>
            <a href="" class="btn btn-primary">
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
                                <th>{{ __('Duration') }}</th>
                                <th>{{ __('Instructor') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        {{-- End of Course Table --}}
    </div>

@endsection
