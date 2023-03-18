@extends('layouts.backend.main')

@section('title', 'Instructor List | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">Instructors</h4>
            <a href="{{ route('instructors.finduser') }}" class="btn btn-primary">
                <i class="fa-solid fa-user-check me-2"></i>Invite Instructor
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
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Department') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($instructors as $instructor)
                                <tr>
                                    <td>{{ $instructor->instructor_name }}</td>
                                    <td>{{ $instructor->email }}</td>
                                    <td>{{ $instructor->instructor_title }}</td>
                                    <td>{{ $instructor->instructor_department }}</td>
                                    <td>
                                        @if ($instructor->is_disabled)
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
