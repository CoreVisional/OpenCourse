@extends('layouts.backend.main')

@section('title', 'Instructor Details | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">
                <a href="{{ route('instructors.index') }}">
                    <span class="text-muted fw-light">Instructors / </span>
                </a>
                Details
            </h4>
        </div>
    </div>

@endsection
