@extends('layouts.app')

@section('title', 'Courses | OpenCourse')

@section('content')

    <div class="page-content bg-white">
        {{-- Inner page banner --}}
        <div class="page-banner ovbl-dark" style="background-image:url(/img/banner/courses-page-banner.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">COURSES</h1>
                </div>
            </div>
        </div>
        {{-- Breadcrumb row --}}
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        {{-- Breadcrumb row END --}}

        {{-- Course page content --}}
        <div class="page-banner course-section">
            <div class="container">
                <!-- Course Placeholder Card -->
                <div class="course-card">
                    <div class="course-image">
                        <img src="https://via.placeholder.com/250x150" alt="Course Thumbnail" />
                    </div>
                    <div class="course-details">
                        <h3 class="course-title">Course Title</h3>
                        <p class="course-description">
                            A brief description of the course content. This should be
                            short and informative.
                        </p>
                    </div>
                </div>
                <!-- End of Course Placeholder Card -->
            </div>
        </div>
        {{-- End of Course page content --}}
    </div>

@endsection
